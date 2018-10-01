@extends('layouts.admin-app')

@section('content')

<div class = "container">
<div class = "row">
<div class = "col-md-6">
       {{-- Edit Books Form --}}
       <form action = "{{route('authors.update',$details->id)}}" method = "POST" enctype="multipart/form-data">
        @csrf
        {!! method_field('patch')!!}
     
    {{-- Authors Name --}}
    <div class = "form-group">
        <label>Author's Name:</label>
    <input type = "text" name = "name" class = "form-control" value = "{{$details->author_name}}" required>
     </div>

     {{-- Email --}}
     <div class = "form-group">
        <label>Email:</label>
<input type = "email" name = "email" class = "form-control" value = "{{$details->email}}" required>
     </div>

     {{-- Nationality --}}
     <div class = "form-group">
        <label>Nationality:</label>
<input type = "text" class = "form-control" name = "nation" value = "{{$details->nationality}}" required> 
     </div>
     {{-- Date of Birth --}}
     <div class = "form-group">
        <label>Date of Birth:</label>
        <input type = "date" name = "dob" class = "form-control" value = "{{$details->dob}}" required>
     </div>

     <div class = "form-group">
            
            <button type="submit" class="btn btn-primary" >Submit</button>
         </div>
      </form>
</div>

</div>

</div>

@endsection