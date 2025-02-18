<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('layout.dashboard');
    }

    public function formElements(){
        return view('forms.form-elements');
    }

    public function inputGroups(){
        return view('forms.input-groups');
    }

    public function formsLayouts(){
        return view('forms.forms-layouts');
    }
}
