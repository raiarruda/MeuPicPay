@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
	<h1>Saldo</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Saldo</a></li>
	</ol>
@stop

@section('content')
	<div class="box">
		<div class="box-header">
			<a href="{{ route('balance.deposit') }}" class="btn btn-success"> <span class="fa fa-arrow-up"> </span> Depositar</a>

			@if($amount >0)
				<a href="{{ route('balance.withdraw')}}" class="btn btn-danger"><span class="fa fa-arrow-down"> </span> Sacar</a>
				<a href="{{ route ('balance.transferTo')}}" class="btn btn-warning"><span class="fa fa-exchange"> </span> Transferir</a>
			@endif
		</div>
		<div class="box-body">
			@include('admin.includes.alerts')

			<div class="small-box bg-olive">
				<div class="inner">
					<h3>R$ {{ number_format($amount, 2, '.','') }}</h3>
				</div>
				<div class="icon">
					<i class="ion ion-money"></i>
				</div>
				<a href="#" class="small-box-footer"> Histórico <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
@stop