@extends('layouts.app')

@section('content')

<div class = "container-fluid mb-5">
        <div class = "card">
            <div class = "card-body">
            <h1 class = "text-center">Search Results</h1>
            </div>
        </div>
        </div>
        <div class = "container-fluid">
                <div class = "row">
                        <div class = "col-md-7 border-right">
                                <div class = "container-fluid p-3">
                                    <div class = "row">
                                    @foreach($result as $data)
                            <div class = "col-md-4 mb-3 ">
                                <div class = "outer">
                                        @if(Auth::guard('web')->user())
                                    <div class = "heart-div" id = "fav-div">
                                            <form id = "favform" action = "{{route('favourites.store')}}" method = "POST">
            @csrf
                                                    <input type = "hidden" name = "book_id" value = "{{$data->id}}">
                                                  
                                                    <button class = "fa fa-heart fa-2x heart" id = "heart"></button>
                                                        </form>
                                            
                                    </div>
                                    @endif
                            <img class = "books-img latest" src = "{{asset('images/BooksImages/' . $data->book_name . '/' . $data->book_image)}}">
                            <a href = "{{route('books.view',$data->id)}}"><h6 class = "text-center p-2">{{$data->book_name}}</h6></a>
                                </div>
                            </div>
                            @endforeach
                                    </div>
                                </div>
                            </div>
                    <div class  = "col-md-4">
                           
            
                    </div>
                     
                </div>
            </div>
<script>
    $(document).ready(function(){
$('.outer').mouseenter(function(){
    $(this).children('.heart-div').css('display','block');
});
$('.outer').mouseleave(function(){
    $(this).children('.heart-div').css('display','none');
});

$('.heart').mouseenter(function(){
    $(this).addClass('heart-red');
});
$('.heart').mouseleave(function(){
    $(this).removeClass('heart-red');
});


$('.heart').click(function(){
    if(confirm("Add this book to favourites??")){
$('#favform').submit();
$('.heart').off('mouseleave');
    }
    else
    {
        $('.heart').on('mouseleave');
    }
});
    });
</script>
@endsection