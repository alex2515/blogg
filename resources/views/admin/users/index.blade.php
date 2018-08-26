@extends('admin.layout')

@section('header')
      <h1>
        USUARIOS
        <small>Listado de usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Crear</li>
      </ol>
@stop

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de usuarios</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear usuario</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="users-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
            <td>
              <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
              <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
              <form method="user" action="{{ route('admin.users.destroy', $user ) }}" style="display: inline;">
                {{ method_field('DELETE') }} {{ csrf_field()  }}
                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')" ><i class="fa fa-times"></i></button>
              </form>
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@stop

@push('styles')
  <!-- DataTables  -->
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')
  <!-- Datatables js -->
  <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#users-table').DataTable()
    })
  </script>
@endpush