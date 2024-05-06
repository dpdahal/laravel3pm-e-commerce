<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $pagePath = "backend.pages.";

    public function index()
    {
        $auth = auth()->user();
        $role = $auth->role;
        if ($role != 'admin') {
            return redirect()->route('dashboard');
        } else {
            $usersData = User::where('id', '!=', $auth->id)->get();
            return view($this->pagePath . 'users.index', compact('usersData'));
        }
    }


    public  function  profile()
    {

        return view($this->pagePath . 'users.user-profile');
    }
}
