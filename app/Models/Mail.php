<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    
    public function assignedTo(){
        return $this->belongsTo(User::class,'assigned_to');
    }

    public function subjectOfficer(){
        return $this->belongsTo(User::class,'subject_officer');
    }

    public function dataEnteredBy(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
