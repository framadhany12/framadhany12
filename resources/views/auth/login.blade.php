@extends('layouts.app')

 

@section('title', 'Login')

 

@section('content')

<div class="container">

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="form-group">

            <label for="email"> Email </label>

            <input id="email" type="email" name="email" value="{{ old('email') }}" required

                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

        </div>

        @error('email')

            <div class="alert alert-danger"> {{ $message }}</div>

        @enderror

 

        <div class="form-group">

            <label for="password"> Password </label>

            <input id="password" type="password" name="password" required

                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

        </div>

        @error('password')

            <div class="alert alert-danger"> {{ $message }}</div>

        @enderror

 

        <div class="form-group">

            <div class="form-check">

                <input id="remember" type="checkbox" name="remember" value="{{ old('remember') ? 'cheked' : ''}}"

                class="form-check-input">

 

                <label for="remember"> Remember me </label>

            </div>

 

        </div>

 

        <button type="submit" class="btn btn-primary btn-block"> Login </button>

    </form>

</div>
<br><hr class="featurette-divider">
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>@Frs12 enc 2021. . <a href="#">Privacy</a> .<a href="#"Terms></a></p>
    </footer>
  </main>

@endsection