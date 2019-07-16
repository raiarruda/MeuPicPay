@extends('adminlte::page')

@section('title', 'Novo Deposito')

@section('content_header')
	<h1>Depositar</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Saldo</a></li>
		<li><a href="">Depositar</a></li>
	</ol>
@stop

@section('content')
	<div class="box">
		<div class="box-header">
			<h3>Depositar</h3>
		</div>
		<div class="box-body">
			@include('admin.includes.alerts')

			<form class="form-inline" action="{{ route('deposit.store')}}" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<input class="form-control" type="text" name="valor" placeholder="Valor">
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-sm" type="submit" > Enviar </button>
				</div>
			</form>
		</div>
	</div>
@stop