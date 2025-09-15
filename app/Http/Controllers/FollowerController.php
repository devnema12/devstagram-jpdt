<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //

    public function store(User $user, Request $request)
    {
        // Para agreagr a la tabla de follower quien esdta siguiendo a quien
        // dd(Auth::user()->id);
        $user->followers()->attach(Auth::user()->id);
        return back();
    }


    public function destroy(User $user, Request $request)
    {
        // Para agreagr a la tabla de follower quien esdta siguiendo a quien
        // dd(Auth::user()->id);
        $user->followers()->detach(Auth::user()->id);
        return back();
    }
}