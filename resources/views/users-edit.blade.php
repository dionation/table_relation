@extends('adminlte::page')

@section('content')


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Formulaire de modification du membre</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
  <form action="/admin/users/{{$user->id}}/" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputName">Name</label>
          <input type="email" class="form-control" id="exampleInputName" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
