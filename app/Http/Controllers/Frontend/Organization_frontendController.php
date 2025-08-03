<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrganizationMember;
use Illuminate\Http\Request;

class Organization_frontendController extends Controller
{
    public function index()
    {
        $members = OrganizationMember::orderBy('order')->get();
        return view('frontend.about.organization', compact('members'));
    }
}