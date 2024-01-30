<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $postPublish = BlogPost::where('is_publish','1')->get();
        $webVisit = BlogPost::withTotalVisitCount()->first()->visit_count_total;

        $post_count = count($postPublish);

        return view('admins.dashboard',['post_count'=>$post_count, 'webVisit'=>$webVisit]);
    }
}
