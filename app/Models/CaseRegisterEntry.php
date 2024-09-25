<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseRegisterEntry extends Model
{
    use HasFactory;

    public function file(){
        return $this->belongsTo(FrontPage::class, 'front_page_id');
    }

}
