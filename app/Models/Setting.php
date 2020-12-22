<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];
    
    protected $table = 'notfound';

    public static function get($key)
    {
        $setting = new self();
        $entry = $setting->whereKey($key)->first();
        if (!$entry) {
            return;
        }
        return $entry->value;
    }

    public static function set($key, $value = null)
    {
        $setting = new self();

        $entry = $setting->where('key', $key)->firstOrFail();

        $entry->value = $value;
        $entry->saveOrFail();

        /*$setting->firstOrNew([
            'key' => $key,
            'value' => $value
        ]);*/

        Config::set('key', $value);
        if (Config::get($key) == $value) {
            return true;
        }
        return false;
    }
}
