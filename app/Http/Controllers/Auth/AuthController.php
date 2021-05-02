<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use App\Models\User;
use App\Services\UserService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->middleware("auth")->only("logout");
        $this->userService = app(UserService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        return view("auth.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegister()
    {
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(CreateUserRequest $request)
    {
        $user = $this->userService->createUser(
            $request->get("email"),
            $request->get("password")
        );

        if ($user) {
            Auth::login($user);
            return redirect()->to("/");
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param LoginUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginUserRequest $request)
    {
        $user = $this->userService->getUserByEmail($request->get("email"));

        if ($user) {
            if (Hash::check($request->get("password"), $user->password)) {
                Auth::login($user);
                return redirect()->to("/");
            }

            return back()
                ->withInput($request->input())
                ->withErrors([
                    "password" => "Invalid email or password",
                ]);
        }

        return back()->withInput($request->input());
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}
