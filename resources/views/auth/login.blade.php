@extends("layouts.app")

@section("content")
@include("auth.templates.error")
    <div style="max-width: 50em;" class="card border-dark mx-auto shadow">
        <div class="card-header bg-secondary">
            <h2 class="mb-0 text-light">Sign in</h2>
        </div>
        <form method="POST" class="card-body" action="{{url("/auth/login")}}">
            @csrf
            <div class="form-group">
                <label class="lead" for="email">Email</label>
                <input name="email" id="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label class="lead" for="password">Password</label>
                <div class="input-group password-input">
                    <input name="password" id="password" type="password" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn input-group-text password-toggle">
                        <span class="material-icons">
                            visibility
                        </span>
                        </button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block mb-2" type="submit">Login</button>
            <p>Don't have an account? <a href="{{url("/auth/register")}}">Sign up</a></p>
        </form>
    </div>
@endsection
