@extends("layouts.app")

@section("content")
    <div style="max-width: 50em;" class="card border-dark mx-auto shadow">
        <div class="card-header bg-secondary">
            <h2 class="mb-0 text-light">Sign in</h2>
        </div>
        <form method="POST" class="card-body" action="{{url("/auth/login")}}">
            @include("auth.includes.baseform")
            <button class="btn btn-primary btn-block mb-2" type="submit">Login</button>
            <p>Don't have an account? <a href="{{url("/auth/register")}}">Sign up</a></p>
        </form>
    </div>
@endsection
