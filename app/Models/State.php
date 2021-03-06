<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model 
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    public function districts(){
        return $this->hasMany(Disctrict::class);
    }
}
