<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function store_member(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $member = new Members();
        $member->user_id = $request->user_id;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->member_id = Str::random(9);
        $member->save();

        $user = User::find($request->user_id);
        $user->member_id = $member->member_id;
        $user->save();

        return redirect()->back();
    }
}
