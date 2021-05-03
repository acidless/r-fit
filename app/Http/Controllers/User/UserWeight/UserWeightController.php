<?php

namespace App\Http\Controllers\User\UserWeight;

use App\Http\Controllers\Controller;
use App\Services\WeightService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserWeight\CreateWeightRequest;

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
        $weightData = $this->weightService->getWeightData(Auth::id());

        return view("welcome", compact("weightData"));
    }

    public function graph()
    {
        $weightData = $this->weightService->getWeightData(Auth::id());

        return view("pages.chart", compact("weightData"));
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

        $userId = Auth::id();

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weight = $this->weightService->deleteWeight(Auth::id(), $id);

        if ($weight) {
            $response = back()->with([
                "message" => "Successfully removed weight data!",
            ]);

            if ($weight->created_at->day == now()->day) {
                return $response->withoutCookie("wsa", "/");
            }

            return $response;
        }

        return back()->withErrors([
            "message" => "Weight with this ID not found!",
        ]);
    }
}
