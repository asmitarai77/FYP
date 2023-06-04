<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Members;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function members()
    {
        $member = Members::latest()->all();
        return view('admin.member.index', compact('member'));
    }

    public function contacts()
    {
        $contacts = Contacts::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }
}
