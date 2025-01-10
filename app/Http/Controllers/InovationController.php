<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InovationController extends Controller
{
    public function index() {
        return view('admin.inovations.index');
    }
}
