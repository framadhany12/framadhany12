@extends('layouts.app')

 

@section('title', 'Add Name')

 

@section('content')

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf

        @include('posts.partials.form')

        <div>

            <input type="submit" value="Create">

        </div>

    </form>
<br><hr class="featurette-divider">
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>@Asep Copyright 2021. . <a href="#">Privacy</a> .<a href="#"Terms></a></p>
    </footer>
  </main>
 

@endsection