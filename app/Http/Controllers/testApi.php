<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testApi extends Controller
{
    function getData(){
        return ["name"=>"Pradeep","email"=>"pk123@gmail.com","address"=>"Lucknow","mobile"=>"9555000123"];
    }
}
