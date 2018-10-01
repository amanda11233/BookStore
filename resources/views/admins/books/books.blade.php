@extends('layouts.admin-app')

@section('content')

<div class = "container-fluid">

<div class = "container-fluid mb-2">
    <button class = "btn btn-primary" data-toggle = "modal" data-target = "#addModal">Add Books</button>
</div>

    <table class = "table table-hover">
<tr>

    <th>SN</th>
    <th>Book Name</th>
    <th>Written By</th>
    <th>Published Date</th>
    <th>Language</th>
    <th>Category</th>
    <th>Price</th>
    <th>Book Image</th>
    <th>Book PDF</th>
    <th></th>
</tr>

@foreach($books as $key => $book)
<tr>
<td>{{$key+1 }}</td>
    <td>{{$book->book_name}}</td>
<td>{{$book->author->author_name}}</td>
<td>{{$book->published_date}}</td>
    <td>{{$book->language->language_name}}</td>
    <td>{{$book->category->category_name}}</td>
<td>{{$book->price}}</td>
<td><img class = "books-image" src = "{{asset('images/BooksImages/' . $book->book_name . '/' . $book->book_image )}}"></td>
<td><a href = "{{asset('PDFs/BooksPdf/' . $book->book_name . '/' . $book->book_pdf )}}">{{$book->book_pdf}}</a></td>


<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Books\BooksController@destroy',$book->id]]) !!}
    <div class="form-group">
            {{Form::button('Delete ',['class'=>'btn btn-danger','type'=>'submit','onclick'=>'return confirm("Do you want to delete")'])}}
    </div>
     {!! Form::close() !!}</td>

</tr>
@endforeach
    </table>

  

</div>


{{-- Add Books Modal Starts Here --}}

<div class = "modal fade" id = "addModal" tabindex = "-1" role = "dialog" aria-labelledby="addModal">

<div class = "modal-dialog" role = "document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Books</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- Add Books Form --}}
        <form action = "{{route('books.store')}}" method = "POST" enctype="multipart/form-data">
            @csrf
            {{-- Book Name --}}
       <div class = "form-group">
           <label>Book Name:</label>
<input type = "text" name = "book_name" class = "form-control" required>
        </div>

        {{-- Authors Name --}}
        <div class = "form-group">
            <label>Author's Name:</label>
            <select class = "form-control" name = "author" required>
                <option>Select Author</option>
                @foreach($auth as $write)
                 <option value = {{$write->id}}>{{$write->author_name}}</option>
                @endforeach
                 </select>
         </div>

         {{-- Published Date --}}
         <div class = "form-group">
            <label>Published Date:</label>
 <input type = "date" name = "date" class = "form-control" required>
         </div>

         {{-- Language --}}
         <div class = "form-group">
            <label>Language:</label>
 <select class = "form-control" name = "language" required>
<option>Select Language</option>
@foreach($lang as $value)
 <option value = {{$value->id}}>{{$value->language_name}}</option>
@endforeach
 </select>
         </div>
         {{-- Category --}}
         <div class = "form-group">
            <label>Category:</label>
            <select class = "form-control" name = "category" required>
                <option>Select Category</option>
                @foreach($cat as $value2)
            <option value = {{$value2->id}}>{{$value2->category_name}}</option>
@endforeach
                 </select>
         </div>
{{-- Price --}}
         <div class = "form-group">
            <label>Book Price:</label>
 <input type = "number" name = "price" class = "form-control" required>
         </div>

{{-- Image --}}
         <div class = "form-group">
            <label>Book Image:</label>
 <input type = "file" name = "image" class = "form-control" required>
         </div>
{{-- PDF --}}
         <div class = "form-group">
            <label>Book PDF:</label>
 <input type = "file" name = "pdf" class = "form-control" required>
         </div>
         <div class = "form-group">
                
                <button type="submit" class="btn btn-primary" >Submit</button>
             </div>
          </form>
        </div>

      
        
        <div class="modal-footer">
               
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
        </div>
      </div>

</div>


</div>

{{-- Add books modal ends here --}}
@endsection