@extends("layouts.app")

@section("content")
@auth()
    <div class="row mx-auto mb-5">
        <div class="col-md-5 card bg-dark text-white">
            <div class="card-body">
                <form method="POST" action="{{url("/me/weight")}}">
                    @csrf
                    <h3 class="card-title font-weight-bold">
                        <label for="weight">Enter your weight</label>
                    </h3>
                    <p class="card-text">You can enter your daily weight to make statistics and graphics!</p>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" min="3" max="500" pattern="[0-9]+\.{0,1}[0-9]{0,2}" name="amount" id="weight">
                        <div class="input-group-append">
                            <span class="input-group-text">kilos</span>
                        </div>
                    </div>
                    <button class="btn btn-block btn-success">Send</button>
                </form>
            </div>
        </div>
        <div class="col-md-5 offset-md-1 card bg-dark">
            <div class="card-body"></div>
        </div>
    </div>
    @include("includes.weightList")
    <div class="d-flex justify-content-center">
        {{$weightData->links()}}
    </div>
@endauth
@endsection
