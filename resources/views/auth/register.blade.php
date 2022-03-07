@extends('layouts.app')

 

@section('title', 'Register')

 

@section('content')

<div class="container">

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <div class="form-group">

            <label for="name"> Name </label>

            <input id="name" type="text" name="name" value="{{ old('name') }}" required

                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

        </div>

        @if ($errors->has('name'))

            <span class="invalid-feedback">

                <strong> {{ $errors->first('name') }} </strong>

            </span>

        @endif

 

        <div class="form-group">

            <label for="email"> Email </label>

            <input id="email" type="email" name="email" value="{{ old('email') }}" required

                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

        </div>

        @if ($errors->has('email'))

            <span class="invalid-feedback">

                <strong> {{ $errors->first('email') }} </strong>

            </span>

        @endif

 

        <div class="form-group">

            <label for="password"> Password </label>

            <input id="password" type="password" name="password" required

                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

        </div>

        @if ($errors->has('password'))

            <span class="invalid-feedback">

                <strong> {{ $errors->first('password') }} </strong>

            </span>

        @endif

 

        <div class="form-group">

            <label for="password_confirmation"> Password Confirmation</label>

            <input id="password_confirmation" type="password" name="password_confirmation" required

                class="form-control">

        </div>

 

        <button type="submit" class="btn btn-primary"> Register </button>

    </form>

</div>
<br><hr class="featurette-divider">
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>@Frs12 enc 2021. . <a href="#">Privacy</a> .<a href="#"Terms></a></p>
    </footer>
  </main>
@endsection