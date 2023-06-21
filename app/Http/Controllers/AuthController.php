<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Response;

class AuthController extends Controller
{
    public function create(): Response {
        return inertia("Auth/Login");
    }

    public function store(CreateAuthRequest $req): RedirectResponse {
        if (!Auth::attempt($req->except(["rememberme"]), $req->input("rememberme"))){
            throw ValidationException::withMessages([
                "email" => "auth failed"
            ]);
        }
        $req->session()->regenerate();
        return to_route("post.index");
    }

    public function destroy(Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('login');
    }
}
