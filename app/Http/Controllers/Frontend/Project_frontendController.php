<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class Project_frontendController extends Controller
{
    /**
     * Display the projects page on the frontend.
     */
    public function index()
    {
        $years = Project::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $projects = Project::orderBy('year', 'desc')->orderBy('order', 'asc')->get();

        return view('frontend.projects', compact('years', 'projects'));
    }
}
