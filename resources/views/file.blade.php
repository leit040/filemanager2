@extends('layout')
@section('content')

    <table border="2">
        <tr>
            <th>id</th>
            <th>filename</th>
            <th>url</th>
            <th>Storage</th>
            <th>Created-at</th>
            <th>Updated_at</th>
            <th>action</th>
        </tr>

            @foreach($files as $file)
            <tr>
        <td>{{$file->id}}</td>
        <td>{{$file->name}}</td>
        <td>{{$file->url}}</td>
        <td>{{$file->store}}</td>
        <td>{{$file->created_at}}</td>
        <td>{{$file->updated_at}}</td>
        <td><a href="/delete/{{$file->id}}">Delete</a></td>
        </tr>
            @endforeach

    </table>

    <div class="form" >
        <form action="/save"  method="post" enctype="multipart/form-data" class="main_form">
            @csrf
            <input type="file" name="file" >
           @error('file') {{ $message }}@enderror
            <input type="radio" name="store" id="radioLocal" value="public" checked>
            @error('store') {{ $message }}@enderror
            <label for="radioLocal">Local</label>
            <input type="radio" id="radioDropbox" name="store" value="dropbox">
            <label for="radioDropbox">Dropbox</label>
            <input type="submit"value="Save">


        </form>
    </div>
    </div>
@endsection
