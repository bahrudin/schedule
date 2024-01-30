<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $count = '2024';

        return view('admins.dashboard',['count'=>$count]);
    }
}
