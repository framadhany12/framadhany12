<div class="form-group">

    <label for="Nama"> Nama </label>

    <input id="Nama" type="text" name="Nama" class="form-control" value="{{ old('Nama', optional($post ?? null)->Nama ) }}">

</div>

 

@error('title')

    <div class="alert alert-danger"> {{ $message }}</div>

@enderror

<div class="form-group">

    <label for="Pekerjaan"> Pekerjaan </label>

    <textarea id="Pekerjaan" name="Pekerjaan" class="form-control" >{{ old('Pekerjaan', optional($post ?? null)->Pekerjaan ) }}</textarea>

</div>

 

@error('content')

    <div class="alert alert-danger"> {{ $message }}</div>

@enderror

 

@if($errors->any())

    <div class="mb-3">

        <ul class="list-group">

            @foreach ($errors->all() as $error )

                <li class="list-group-item list-group-item-danger"> {{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif