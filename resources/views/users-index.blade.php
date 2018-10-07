@extends('adminlte::page')

@section('content')

<h1>Bienvenue {{Auth::user()->name }}</h1>
<a href="/admin/users/create" class="btn btn-success">Créer</a>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des utilisateurs</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tbody><tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
      @foreach ($users as $user)
     
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->role->name}}</td>
          <td>
            <form action="/admin/users/{{$user->id}}/edit" method="get">
              <button class="btn btn-warning text-warning">Edit</button>
            </form>
          </td>
          <td>
            <form action="/admin/users/{{$user->id}}" method="post">
                @csrf
                @method('DELETE')
                  @can('DeleteUser',$user->role_id)              
                    <button class="btn btn-danger text-danger">Delete</button>
                  @endcan
            </form>
            </td>
          </tr>
        @endforeach
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
@stop