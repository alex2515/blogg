@extends('admin.layout')
@section('content')
	<h1>Dashboard</h1>
	<p>Usuario auténticado: {{ auth()->user()->name }}</p>
@stop