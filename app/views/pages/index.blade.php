@extends('layouts/scaffold')

@section('page-breadcrumb')

	<li>
	    <i class="fa fa-home"></i>
	    <a href="index.html">Home</a>
	    <i class="fa fa-angle-right"></i>
	</li>
	<li>
	    <a href="#">Dashboard</a>
	</li>

@stop

@section('main')
@if (Auth::user()->hasRole('admin'))
    @include('layouts/admin/content/statistics')
@endif
@stop