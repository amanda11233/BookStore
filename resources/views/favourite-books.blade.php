@extends('layouts.app')

@section('content')

<div class = "container-fluid mb-5">
        <div class = "card">
            <div class = "card-body">
            <h1 class = "text-center">Favourites</h1>
            </div>
        </div>
        </div>
<div class = "container-fluid">
    <div class = "row">
        @foreach($users->books as $data)
        <div class = "col-sm-2">
             
                        <div class = "close-outer">
                   <div class = "close-div">
                   <form id = "favform" action = "{{route('favourites.edit',$data->id)}}" method = "GET">
                           @csrf
                           {!! method_field('patch')!!}
                           <button type = "submit" class = "fa fa-times fa-3x fav-close"></button>
                          
                       </form>
                        
                   </div>

                <img class = "books-img" src = "{{asset('images/BooksImages/' . $data->book_name . '/' . $data->book_image)}}">
                <a href = "{{route('books.view',$data->id)}}"><h6 class = "text-center p-2">{{$data->book_name}}</h6></a>
            </div>
        </div>
        @endforeach
     
        
    </div>

</div>

<script>
        $(document).ready(function(){
    $('.close-outer').mouseenter(function(){

        $(this).children('.close-div').css('display','block');
    });
    $('.close-outer').mouseleave(function(){
        $(this).children('.close-div').css('display','none');
    });
    
    $('.fav-close').mouseenter(function(){
        $(this).addClass('close-red');
    });
    $('.fav-close').mouseleave(function(){
        $(this).removeClass('close-red');
    });
    
    
    $('.fav-close').click(function(){
        if(confirm("Remove from favourites??")){
    $('#favform').submit();
    $('.fav-close').off('mouseleave');
        }
        else
        {
            $('.fav-close').on('mouseleave');
        }
    });
        });
    </script>
@endsection