<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class UserAccountController extends Controller
{
    public function create(): Response {
        return inertia("UserAccount/Register");
    }

    public function store(CreateUserRequest $req): RedirectResponse {
        $createdUser = User::create($req->all());

        Auth::login($createdUser);
        return to_route("index");
    }

    public function show(User $user): Response
    {
        return inertia('UserAccount/Show', [
            'page' => User::selfPost($user->id)->paginate(5),
        ]);
    }

    public function following(User $user) : Response {
        return inertia('UserAccount/Following', [
            'page' => $user->followings()->paginate(10),
        ]);
    }
    
}
