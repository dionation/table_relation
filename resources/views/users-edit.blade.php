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
      <h3 class="box-title">Formulaire de modification du membre</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
  <form action="/admin/users/{{$user->id}}/" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="box-body">
          <div class="form-group">
              <label for="exampleInputImage">Image</label><br>
              <img src="{{Storage::url($user->url)}}" alt="" height="150px" width="150px">              
              <input type="file" id="exampleInputImage" name="image">
            </div>
        <div class="form-group">
          <label for="exampleInputName">Name</label>
          <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" name="name"  value="{{old('name', $user->name)}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter email" value="{{$user->email}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nouveau password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password"  >
        </div>
       
        <div class="form-group">
          <label>Roles  </label>
          <select class="form-control" name="role_id">
              <option value="{{$user->role->id}}" >{{$user->role->name}}</option>
            @foreach($roles as $role)
              @if($user->role->name != $role->name)
                <option value="{{$role->id}}">{{$role->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

@stop
