@extends('layouts.admin-app')

@section('content')

<div class = "container-fluid">

    <div class = "container-fluid mb-2">
        <button class = "btn btn-primary" data-toggle = "modal" data-target = "#addModal">Add Authors</button>
    </div>
    
  

    <table class = "table table-hover">
<tr>

    <th>SN</th>
    <th>Name</th>
    <th>Email</th>
    <th>Nationality</th>
    <th>Date Of Birth</th>
<th></th>
<th></th>
</tr>
@foreach($authors as $key => $data)
<tr>
<td>{{$key+1 }}</td>
<td>{{$data->author_name}}</td>
<td>{{$data->email}}</td>
<td>{{$data->nationality}}</td>
<td>{{$data->dob}}</td>

<td>
    <a href = "{{route('authors.edit',$data->id)}}">
        <button id = "editAuthors" class = "btn btn-secondary" >Edit</button></a>

</td>

<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Authors\AuthorsController@destroy',$data->id]]) !!}
        <div class="form-group">
                {{Form::button('Delete ',['class'=>'btn btn-danger','type'=>'submit','onclick'=>'return confirm("Do you want to delete")'])}}
        </div>
         {!! Form::close() !!}</td>
</tr>
@endforeach
    </table>

  
{{-- Add Authors Modal Starts Here --}}

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
        <form action = "{{route('authors.store')}}" method = "POST" enctype="multipart/form-data">
            @csrf
         

        {{-- Authors Name --}}
        <div class = "form-group">
            <label>Author's Name:</label>
        <input type = "text" id = "name" name = "name" class = "form-control" required>
         </div>

         {{-- Email --}}
         <div class = "form-group">
            <label>Email:</label>
 <input type = "email" name = "email" class = "form-control" required>
         </div>

         {{-- Nationality --}}
         <div class = "form-group">
            <label>Nationality:</label>
<input type = "text" class = "form-control" name = "nation" required> 
         </div>
         {{-- Date of Birth --}}
         <div class = "form-group">
            <label>Date of Birth:</label>
            <input type = "date" name = "dob" class = "form-control" required>
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

{{-- Add Authors modal ends here --}}


</div>

@endsection
