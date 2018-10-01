@extends('layouts.app')


@section('content')
@if($checkrate == '1') 
<span class = "d-none checkrate" id = "#checkrate">
       
 1
    
</span>
@endif
<div class = "container">
<div class = "row">

    <div class = "col-md-6">
        
    <img src = "{{asset('images/BooksImages/' . $books->book_name . '/' . $books->book_image )}}" class = "view-books-image" >
   
    </div>

    <div class = "col-md-6">
    <div class = "card">
        <div class = "card-header">
        <h1>{{$books->book_name}}</h1>
        </div>

        <div class = "card-body">
            <div class = "container-fluid">
                <div class = "row">
                    <div class = "col-sm-6 mt-3">
                            <h5>Author: </h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5> &nbsp;{{$books->author->author_name}}</h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5>Published Date: </h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5> &nbsp;{{$books->published_date}}</h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5>Category: </h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5> &nbsp;{{$books->category->category_name}}</h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5>Language: </h5>
                    </div>
                    <div class = "col-sm-6 mt-3">
                            <h5>&nbsp;{{$books->language->language_name}}</h5>
                    </div>
                  
                   
                    <div class = "col-sm-6 mt-3">
                                <h5>Ratings: </h5>
                        </div>
                    <div class = "col-sm-6 mt-3">
                                <span  id = "0-star"></span>
                                <span class = "fa fa-star fa-2x rated " id = "1-star"></span>
                                <span class = "fa fa-star fa-2x rated"  id = "2-star"></span>
                                <span class = "fa fa-star fa-2x rated"  id = "3-star"></span>
                                <span class = "fa fa-star fa-2x rated"  id = "4-star"></span>
                                <span class = "fa fa-star fa-2x rated"  id = "5-star"></span>
                    <span id = "showRate" class = "d-none">{{$ratings}}</span>
                </div>  
                
                </div>
                @if(Auth::guard('web')->user())
               <div class = "row">
                <div class = "col-sm-4 mt-3 ">
                                <a href = "{{asset('PDFs/BooksPdf/' . $books->book_name . '/' . $books->book_pdf)}}" ><button class = "btn btn-primary" >Read Online</button></a>
                               
                        </div>
                        <div class = "col-sm-4 mt-3 ">
                                 
                                 <button type = "button" class = "btn btn-success" data-toggle = "modal" data-target = "#addModal">Rate Book</button> 
                          </div>
                          <div class = "col-sm-4 mt-3 ">
                          <form action = "{{route('favourites.store')}}" method = "POST" id = "favform">
                                @csrf
                          <input type = "hidden" value = "{{$books->id}}" name = "book_id">
                                        <button type = "button" class = "btn btn-danger" id = "addfav" >+Fav</button>      </form>
                                 </div>       
               </div>
                        
               @endif
            </div>
           
        </div>
      
    </div>
    @if(!Auth::guard('web')->user())
    <div class = "green-infobox">
            <h3>Notice</h3>
                   <ul>
                           <li>
                        You Must Be Logged In For More!!!
                        </li>
                        </ul>
        </div>
    @endif
    </div>
    
</div>


{{-- Add Ratings Modal Starts Here --}}

<div class = "modal fade" id = "addModal" tabindex = "-1" role = "dialog" aria-labelledby="addModal">

                <div class = "modal-dialog" role = "document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Rate This Book</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <div class = "container-fluid">
                                        <div class = "row">
                                                        <div class = "col-md-6">
        <img src = "{{asset('images/BooksImages/' . $books->book_name . '/' . $books->book_image )}}" class = "books-img" >
                                                                       
          </div>
          <div class = "col-md-6">
          <h3>Rate {{$books->book_name}}</h3>
          <hr>
                      {{-- Add Ratings Form --}}
                      <form action = "{{route('ratings.store')}}" id = "ratings" method = "POST" enctype="multipart/form-data">
                        @csrf
                     
                    
    
                    <div class = "form-group">
                    <input type = "hidden" id = "book_id" name = "book_id" value = "{{$books->id}}" class = "form-control" required>
                    <input type = "hidden" id = "rate" name = "rate" class = "form-control" required>
                     </div>
            <div class = "form-group">
                            <span  id = "0"></span>
                            <span class = "fa fa-star fa-2x rating-star" id = "1"></span>
                            <span class = "fa fa-star fa-2x rating-star" id = "2"></span>
                            <span class = "fa fa-star fa-2x rating-star" id = "3"></span>
                            <span class = "fa fa-star fa-2x rating-star" id = "4"></span>
                            <span class = "fa fa-star fa-2x rating-star" id = "5"></span>
            </div>

                    
                      </form>
                      <form action = "{{route('ratings.update',$books->id)}}" id = "ratingsupdate" method = "POST" enctype="multipart/form-data">
                             @csrf
                             {!! method_field('patch') !!}
                        <input type = "hidden" id = "book_id" name = "book_id" value = "{{$books->id}}" class = "form-control" required>
                                <input type = "hidden" id = "uprate" name = "rate" class = "form-control" required>
                </form>
          </div>
                                        </div>
                                </div>
                        
                        </div>
                
                      
                        
                        <div class="modal-footer">
                               
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         
                        </div>
                      </div>
                
                </div>
                
                
                </div>
                
                {{-- Add Languages modal ends here --}}
        </div>
        
</div>

<script>


$(document).ready(function(){

$('#addfav').click(function(){
        alert('Added Successfully');
        $('#favform').submit();
});


var bookrate = $('#showRate').html();
var showrate = Math.round(bookrate);
var stars = showrate + 1;

$('#0-star').nextUntil("#"+stars+"-star","span").addClass("fa-star-orange");


$('.rating-star').click(function(){

var check =  $('.checkrate').html();

if(check == 1){
     
        $("#uprate").val(this.id);
        if(confirm("Do you want to update your ratings?" )){
        $("#ratingsupdate").submit();
  }else{
  
        $('.rating-star').on("mouseleave");
   
  }

}else{
        $("#rate").val(this.id);
  if(confirm("Do you want to give this book " + this.id + " stars" )){
        $("#ratings").submit();
  }else{
  
        $('.rating-star').on("mouseleave");
   
  }
}




        $(this).addClass('fa-star-orange');

    
});
    $('.rating-star').mouseenter(function(){
           
                $(this).addClass('fa-star-orange');
        
                $(this).prevUntil("#0","span").addClass('fa-star-orange');
            
    });

     $('.rating-star').mouseleave(function(){
        
        $('.rating-star').removeClass('fa-star-orange');
    });
});

</script>


@endsection