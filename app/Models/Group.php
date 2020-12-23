<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'admin_id'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function setModeratorIdAttribute()
    {
        $this->attributes['moderator_id'] = 0;
    }
    public function admin()
    {
        return $this->belongsTo(config('appModel.adminModel'), 'admin_id');
    }

    public function moderator()
    {

        return $this->belongsTo(config('appModel.moderatorModel'), 'moderator_id');
    }

    public function leads()
    {
        return $this->hasMany(config('appModel.leadModel'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
