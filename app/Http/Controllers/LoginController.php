<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function _construct()
    {
        $this->middleware("guest", ["except" => "destroy"]);
    }
    public function create()
    {
        return view("auth.login");
    }

    public function store()
    {
        if(!auth()
            ->attempt(request(
                ["email", "password"])))
        {
            return back()->withErrors([
                "message" => "Bad credentials. Please try again"
            ]);
        }
        
        return redirect()->route("all-posts");
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route("all-posts");
    }
}
