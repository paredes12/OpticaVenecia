<?php

namespace App\Http\Controllers;

use App\roles;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function getRoles()
    {
        $roles=roles::all();
        return $roles;
    }
}
