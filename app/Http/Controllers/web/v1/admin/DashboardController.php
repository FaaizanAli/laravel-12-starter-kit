<?php

namespace App\Http\Controllers\web\v1\admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function Dashboard()
    {

        return view('backend.admin.dashboard');
    }
}
