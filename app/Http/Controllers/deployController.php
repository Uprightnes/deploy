<?php

namespace App\Http\Controllers;

use App\Models\deploy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class deployController extends Controller
{
    //
    public function index(){
 
        $deploy = deploy::get();
        return view('deploy.index', compact('deploy'));
    }

    }

    

