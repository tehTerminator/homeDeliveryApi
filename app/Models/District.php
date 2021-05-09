<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model 
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'stateId'
    ];

    public function state() {
        return $this->hasOne(State::class, 'id', 'stateId');
    }
}
