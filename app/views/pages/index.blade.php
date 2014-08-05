@extends('layouts/scaffold')

@section('main')
<div class="starter-template">
    <h3>
        {{ Auth::check() ? "Welcome, " . Auth::user()->username : "Silahkan mendaftar!" }}
    </h3>

    <p class="lead">Selamat Datang di Aplikasi Database PT. Solusindo Bintang Pratama.</p>
</div>
@stop