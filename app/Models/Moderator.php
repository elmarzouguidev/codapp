<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Moderator extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'city_id',
        'tele',
        'address',
        'ville',
        'approved',
        'password',
        'biography',
        'addedBy'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
        'approved',
        'addedBy',
        'email_verified_at',
        'locale',
        'avatar'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $guard = 'moderator';

    protected $guard_name = 'moderator';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ville()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }


    public function leads()
    {
        return $this->hasMany('App\Models\Lead')->where('moderator_id', $this->id);
    }

    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function products(){

        return $this->hasMany('App\Models\Product');
    }

    public function commands(){
        return $this->hasMany('App\Models\Command')
            ->where('moderator_id',$this->id)
        ;
    }

   /* private function getAuthAdmin(){
      return Auth::user()->fullname;
    }*/

    /*protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($query) {
            $query->addedBy = $query->getAuthAdmin();
        });
    }*/
}
