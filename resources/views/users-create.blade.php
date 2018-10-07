@extends('adminlte::page')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Création d'user</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="/admin/users/" method="POST" enctype="multipart/form-data">        
        @csrf
        <div class="form-group">
          <input type="file" name="image" id="">
        </div>
        <div class="form-group">
          <label>Name</label>
        <input type="text" class="form-control" placeholder="Enter ..." name="name" value="{{old('name')}}">
        </div>
       
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" placeholder="Enter ..." name="email" value="{{old('email')}}">
        </div>
        
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter ..." name="password">
        </div>
             
         <!-- select -->
        <div class="form-group">
          <label>Select</label>
        <select class="form-control" name="role">
            @foreach ($roles as $role)
              <option {{(old('role') == $role->id) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
          </select>
        </div>
      <button type="submit" class="btn btn-success">Créer</button>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

@stop
