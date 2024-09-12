<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search=$request->input('search');
        $results=Job::where('name','like',"%$search%")->get();

        return view('Job.index',['results'=>$results]);

    }
}