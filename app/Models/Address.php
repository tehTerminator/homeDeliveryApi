<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model 
{
    
    protected $table = "address";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'line1', 'line2', 'line3', 'district_id', 'default'
    ];

    public function district() {
        return $this->hasOne(Disctrict::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
