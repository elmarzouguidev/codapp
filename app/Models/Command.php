<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;


    protected $fillable = [
        'command_number',
        'command_quantity',
        'command_price',
        'product',
        'status',
        'payment_status',
        'payment_method',
        'code',
        'notes',
        'nom',
        'prenom',
        'email',
        'tele',
        'ville',
        'address',
        'lead_id',
        'product_id',
        'moderator_id',
        'delivery_id',
    ];

    public function lead()
    {

        return $this->belongsTo(config('appModel.leadModel'));
    }

    public function product()
    {
        return $this->belongsTo(config('appModel.productModel'));
    }

    public function moderator()
    {
        return $this->belongsTo(config('appModel.moderatorModel'));
    }
    public function admin()
    {
        return $this->belongsTo(config('appModel.adminModel'));
    }
    public function delivery()
    {
        return $this->belongsTo(config('appModel.deliveryModel'));
    }


    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->command_number = 'CMD-' . strtoupper(uniqid());
        });
    }
}
