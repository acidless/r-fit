@csrf
<div class="form-group">
    <label class="lead" for="email">Email</label>
    <input value="{{old("email")}}" name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror">
    @error('email')
    <div class="invalid-feedback">
        <span>{{$message}}</span>
    </div>
    @enderror
</div>
<div class="form-group">
    <label class="lead" for="password">Password</label>
    <div class="input-group password-input">
        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
        <div class="input-group-append">
            <button type="button" class="btn input-group-text password-toggle">
                <span class="material-icons">
                    visibility
                </span>
            </button>
        </div>
        @error('password')
        <div class="invalid-feedback">
            <span>{{$message}}</span>
        </div>
        @enderror
    </div>
</div>
