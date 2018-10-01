@extends('layouts.app')

@section('content')

<div class = "container-fluid mb-5">
        <div class = "card">
            <div class = "card-body">
            <h1 class = "text-center">Category: {{$category}}</h1>
            </div>
        </div>
        </div>
<div class = "container-fluid">
    <div class = "row">
        @foreach($books as $data)
        <div class = "col-sm-2 col-offset-3">
                <img class = "books-img" src = "{{asset('images/BooksImages/' . $data->book_name . '/' . $data->book_image)}}">
                <a href = "{{route('books.view',$data->id)}}"><h6 class = "text-center p-2">{{$data->book_name}}</h6></a>
            </div>
        @endforeach
        
    </div>

</div>
@endsection