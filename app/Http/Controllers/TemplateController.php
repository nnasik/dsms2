<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller{
    public function index(){
        $data['templates'] = Template::all();
        return view('features/template/templates')->with($data);
    }

    public function createpage(){
                   
    }
}
