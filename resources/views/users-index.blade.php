@extends('adminlte::page')

@section('content')

<a href="/admin/users/create" class="btn btn-success">Créer</a>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Striped Full Width Table</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tbody><tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
      @foreach ($users as $user)
     
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->role->name}}</td>
          <td>
            <form action="/admin/users/{{$user->id}}/edit" method="get">
              <button class="text-warning">Edit</button>
            </form>
          </td>
            <td><a href=""  class="text-danger">Delete</a></td>
          </tr>
        @endforeach
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
@stop