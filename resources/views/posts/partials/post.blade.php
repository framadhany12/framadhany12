<!DOCTYPE html>
<html>
 <div class="float-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Add Name </a>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
     <table class="table table-bordered ">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
       <tbody>
        @foreach ($posts as $post)
        <tr>
            <td class="text-center"><a href="['post'=> $post->id])}}"> {{ $post['id'] }} </a></td>
              </td>
            <td><a href="{{ route('posts.show', ['post'=> $post->id])}}"> {{ $post['Nama'] }} </a><br>Ditambahkan pada {{ $post->created_at->diffForHumans() }}
            oleh {{ $post->user->name }}</td>
            <td class="text-center">
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
            <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Show
            </a>
                   
            @can('update', $post)
            <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>
            @endcan
                  

            @can('delete', $post)
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>   
        @endforeach
    </table>
</tbody>
 <br><hr class="featurette-divider">
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>@Asep Copyright 2021. . <a href="#">Privacy</a> .<a href="#"Terms></a></p>
    </footer>
  </main>
</html>

