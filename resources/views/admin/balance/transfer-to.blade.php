@extends('adminlte::page')

@section('title', 'Novo Deposito')

@section('content_header')
	<h1>Sacar</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Saldo</a></li>
		<li><a href="">Transferir para</a></li>
	</ol>
@stop

@section('content')

	<div class="box">
		<div class="box-header">
			<h3>Transferir para</h3>
		</div>
		<div class="box-body">
			@include('admin.includes.alerts')

			<form class="form-inline" action="{{ route('balance.transfer')}}" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<input class="form-control" type="text" name="sendTo" placeholder="Digite o nome de quem irá receber">
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-sm" type="submit" > Confirmar </button>
				</div>
			</form>
		</div>
	</div>
@stop