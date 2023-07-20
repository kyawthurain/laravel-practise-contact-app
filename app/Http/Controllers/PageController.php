<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userIndex()
    {
        $users = User::paginate(10)->withQueryString();
        return view('user.index',compact('users'));
    }

    public function userIndexAll()
    {
        $users = User::paginate(10)->withQueryString();
        return view('user.index-all',compact('users'));
    }


}
