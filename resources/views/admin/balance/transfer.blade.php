@extends('adminlte::page')

@section('title', 'Novo Deposito')

@section('content_header')
	<h1>Sacar</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Saldo</a></li>
		<li><a href="">Transferir</a></li>
	</ol>
@stop

@section('content')

	<div class="box">
		<div class="box-header">
			<h3>Transferir</h3>
		</div>
		<div class="box-body">
			@include('admin.includes.alerts')
			<p>Transferir para {{ $sendTo->name }}</p>
			<form class="form-inline" action="{{ route('transfer.store')}}" method="post">
				{!! csrf_field() !!}
				<input  type="hidden" name="sendTo" value="{{ $sendTo->id }}">
				<div class="form-group">
					<input class="form-control" type="text" name="valor" placeholder="Valor da Transferencia">
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-sm" type="submit" > Retirar </button>
				</div>
			</form>
		</div>
	</div>
@stop