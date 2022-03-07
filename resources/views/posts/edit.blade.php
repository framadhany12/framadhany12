@extends('layouts.app')

 

@section('title', 'Change Post')

 

@section('content')

    <form action="{{ route('posts.update', ['post'=> $post->id]) }}" method="POST">

        @csrf

        @method('PUT')

        @include('posts.partials.form')

        <div>

            <input type="submit" value="Update">

        </div>

    </form>
    <br><hr class="featurette-divider">
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>@Asep Copyright 2021. . <a href="#">Privacy</a> .<a href="#"Terms></a></p>
    </footer>
  </main>

@endsection