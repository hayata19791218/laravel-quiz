<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    public function edit(User $user){
        return view('profile.edit', compact('user'));
    }

    public function update(User $user, Request $request){

        $user->profileUpdate($request);

        return back()->with('message', 'ユーザー情報を更新しました');
    }
}
