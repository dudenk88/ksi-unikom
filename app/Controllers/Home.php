<?php

namespace App\Controllers;

use App\Helpers\authHelpers;

class Home extends BaseController
{
    public function index()
    {
            return view('welcome_message');
    }
    
}
