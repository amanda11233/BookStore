@extends('layouts.app')

@section('content')
<div class = "container-fluid mb-5">
<div class = "card">
    <div class = "card-body">
        <h1 class = "text-center">WELCOME TO OUR BOOK STORE</h1>
    </div>
</div>

</div>
<div class = "container-fluid">
    <div class = "row">
        <div class  = "col-md-4">
               

        <form class = "form-group search-form" action = "{{route('books.browse')}}" method = "POST">
            @csrf
                 <input type = "text" class = "form-control search-input" name = "book_name" required>
<button type = "Submit" class = "btn btn-success">Search</button>
             </form>
        
        <div class = "books-categories mb-5">
            <h3 class = "text-center">Categories</h3>
            <ul class="list-group">
                @foreach($cat as $value)
            <li class="list-group-item"><a href = "{{route('view.category.books',$value->category_name)}}">{{$value->category_name}}</a></li>
            @endforeach
            </ul>
        </div>
        <div class = "books-languages">
                <h3 class = "text-center">Languages</h3>
                <ul class="list-group">
                    @foreach($lang as $value)
                <li class="list-group-item"><a href = "">{{$value->language_name}}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
            <div class = "col-md-7 border-left">
                    <h3 class = "">
                        Check Out Our Latest Books 
                    </h3>
                    <div class = "container-fluid p-3">
                        <div class = "row">
                        @foreach($books as $data)
                <div class = "col-md-4 mb-3 ">
                    <div class = "outer">
                            @if(Auth::guard('web')->user())
                        <div class = "heart-div" id = "fav-div">
                                <form id = "favform" action = "{{route('favourites.store')}}" method = "POST">
@csrf
                                        <input type = "hidden" name = "book_id" value = "{{$data->id}}">
                                      
                                        <button class = "fa fa-heart fa-3x heart" id = "heart"></button>
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