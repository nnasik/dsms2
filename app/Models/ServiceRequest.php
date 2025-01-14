<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    public function service(){
        return $this->belongsTo('App\Models\Service', 'service_requested');
    }

    public function updates(){
        return $this->hasMany(ServiceRequestUpdate::class, 'service_request_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'opened_by');
    }
}
