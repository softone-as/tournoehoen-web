@extends('layouts.checkout')

@section('title', 'Login | Tournoehoen')

@section('content')
<main>
  <div class="login-container">
    <div class="container">
      <div class="row page-login d-flex align-items-center">
        <div class="section-left col-12 col-md-6">
          <h1 class="mb-4">We explore the new <br/>life much better</h1>
          <img src="" alt="login-image" class="w-75 d-none d-sm-flex">
        </div>
        <div class="section-right col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <img src="frontend/images/logo.png" alt="logo" class="w-50 mb-4">
              </div>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
				  <button type="submit" class="btn btn-login btn-block">
					{{ __('Login') }}
				</button>

				@if (Route::has('password.request'))
					<p class="text-center mt-4">
						<a class="btn btn-link" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
						</a>
					</p>
				@endif
        <p>Or<br><a class="btn btn-link" href="{{ route('password.request') }}">
          don't have account yet?
        </a></p>
        <button type="submit" class="btn btn-login btn-block">
					{{ __('Register') }}
				</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>    
</main>
  
@endsection

