<?php

namespace App\Http\Controllers\User\UserWeight;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserWeight\CreateWeightRequest;
use App\Services\WeightService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWeightController extends Controller
{
    private WeightService $weightService;

    public function __construct()
    {
        $this->weightService = app(WeightService::class);
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateWeightRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateWeightRequest $request)
    {
        if ($request->cookie("wsa")) {
            return back()->withErrors([
                "message" => "Send your weight tomorrow!",
            ]);
        }

        $userId = Auth::user()->getAuthIdentifier();

        $this->weightService->addWeight($userId, $request->get("amount"));

        return back()
            ->with(["message" => "Successfully added weight value"])
            ->withCookie(
                cookie(
                    "wsa",
                    date("Y-m-d H:i:s"),
                    60 * 24,
                    "/",
                    null,
                    false,
                    true
                )
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
