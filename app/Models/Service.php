<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    public function assignedTo(){
        return $this->belongsTo('App\Models\User', 'assigned_to', 'id');
    }
}
