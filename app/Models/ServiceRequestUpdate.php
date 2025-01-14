<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceRequest;


class ServiceRequestUpdate extends Model
{
    use HasFactory;
    
    public function serviceRequest(){
        return $this->belongsTo(ServiceRequest::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'update_by','id');
    }

    
}
