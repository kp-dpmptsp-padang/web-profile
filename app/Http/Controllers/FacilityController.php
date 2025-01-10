<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index() {
        return view('admin.facilities.index');
    }
}
