@extends('layouts.admin-app')

@section('content')

<div class = "container-fluid">

  

    <table class = "table table-hover">
<tr>
        <th></th>
        <th></th>
        <th></th>
    <th>SN</th>
    <th>Name</th>
    <th>Email</th>
    <th></th>
    
</tr>

@foreach($users as $key => $data)

<tr>
        <td></td>
        <td></td>
        <td></td>
<td>{{$key+1}}</td>
<td>{{$data->name}}</td>
<td>{{$data->email}}</td>
<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Users\UsersController@destroy',$data->id]]) !!}
        <div class="form-group">
                {{Form::button('Delete ',['class'=>'btn btn-danger','type'=>'submit','onclick'=>'return confirm("Do you want to delete")'])}}
        </div>
         {!! Form::close() !!}</td>
</tr>

@endforeach
    </table>

  

</div>

@endsection