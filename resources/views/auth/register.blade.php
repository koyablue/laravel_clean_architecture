
<form method="POST" action="{{ route('register') }}">
@csrf

<div class="form-group row">
    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>

<div class="form-group row">
    <label for="email">E-Mail Address</label>


        <input id="email" type="email" name="email" value="{{ old('email') }}">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>

<div class="form-group row">
    <label for="password">Password</label>
    <input id="password" type="password" name="password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>

<div class="form-group row">
    <label for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation">
</div>

<div class="form-group row mb-0">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
</div>
</form>

