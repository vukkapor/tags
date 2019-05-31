<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest", ["except" => "destroy"]);
    }

    public function create()
    {
        return view("auth.login");
    }

    public function store()
    {
        if(!auth()->attempt(request(["email", "password"])))
        {
            return back()->withErrors([
                "message" => "Bad credentials. Please try again"
            ]);
        }
        
        session()->flash("message", "Loginovan");
        return redirect()->route("all-posts");
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route("all-posts");
    }
}
