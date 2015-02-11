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
    <h3>
        {{ Auth::check() ? "Welcome, " . Auth::user()->username : "Silahkan mendaftar!" }}
    </h3>

    <p>Selamat Datang di Aplikasi Database PT. Solusindo Bintang Pratama.</p>
@stop