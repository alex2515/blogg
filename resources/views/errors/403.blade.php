@extends('layout')
@section('content')
	<section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Página no autorizada</h1>
			<div class="divider-2" style="margin: 35px 0;"></div>
			<span style="color: red;">{{ $exception->getMessage() }}</span>
			<p><a href="{{ url()->previous() }}">Regresar</a></p>
		</div>
	</section>
@endsection