@extends('layouts.app')

 

@section('title', 'Posts')

 

@section('content')
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                {{ $post['Nama'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan</strong>
                   {{ $post['Pekerjaan'] }}
            </div>
        </div>
    </div>
              @if (now()->diffInMinutes($post['created_at']) < 5)

                    <b>(new)</b>

                @endif

            </p>

            <p class="text-muted">

            Ditambahkan pada {{ $post->created_at->diffForHumans() }}

            oleh {{ $post->user->name }}

        </p>
        </div>

        <div class="col-md-12">

            <hr>

            <h5> Comments </h5>

            @forelse ($post->comments as $key => $comment)

                <div class="row">

                    <div class="col-md-8">

                        <p> {{ $comment->content }}

                            <br><small> {{ $comment->created_at }}</small>

                        </p>

                    </div>

                </div>

            @empty

                No Comments Found !

            @endforelse

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <hr>

            <form action="{{ route('comments.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="content"> Comments </label>

                    <textarea id="content" name="content" class="form-control" >{{ old('content') }}</textarea>

                </div>

                <input type="hidden" value="{{ $post['id'] }}" name="blog_post_id">

                @error('content')

                    <div class="alert alert-danger"> {{ $message }}</div>

                @enderror

                <div>

                    <input type="submit" value="Submit">

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


