@extends('layouts.admin-app')

@section('content')

<div class = "container-fluid">

        <div class = "container-fluid mb-2">
                <button class = "btn btn-primary" data-toggle = "modal" data-target = "#addModal">Add Categories</button>
            </div>

    <table class = "table table-hover">
<tr>
        <th></th>
        <th></th>
        <th></th>
    <th>SN</th>
    <th>Category Name</th>
    <th></th>
</tr>
@foreach($cat as $key =>  $data)
<tr>
        <td></td><td></td><td></td>
<td>{{$key+1}}</td>
<td>{{$data->category_name}}</td>

<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Categories\CategoriesController@destroy',$data->id]]) !!}
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
                  <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {{-- Add Categories Form --}}
                <form action = "{{route('categories.store')}}" method = "POST" enctype="multipart/form-data">
                    @csrf
                 
        
                {{-- Categories Name --}}
                <div class = "form-group">
                    <label>Categories Name:</label>
                <input type = "text" id = "name" name = "name" class = "form-control" required>
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