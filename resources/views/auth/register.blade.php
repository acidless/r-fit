@extends("layouts.app")

@section("content")
<div style="max-width: 50em;" class="card border-dark mx-auto shadow">
    <div class="card-header bg-secondary">
        <h2 class="mb-0 text-light">Sign up</h2>
    </div>
    <form method="POST" class="card-body" action="{{url("/auth/register")}}">
        @include("auth.includes.baseform")
        <div class="form-group">
            <label class="lead" for="password_confirmation">Password Confirm</label>
            <div class="input-group password-input">
                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                <div class="input-group-append">
                    <button type="button" class="btn input-group-text password-toggle">
                        <span class="material-icons">
                            visibility
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block mb-2" type="submit">Register</button>
        <p>Have an account? <a href="{{url("/auth/login")}}">Sign in</a></p>
    </form>
</div>
@endsection
