@extends('layouts.scaffold')


@section('style-atas')

    @include('problems/atas')

@stop

@section('main')

    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="panel-title" align="center">Buat Data Baru Problem</h1></div>
    </div>

    {{ Form::open(array('route' => 'problems.store')) }}

                    @include('problems/form')

                    <div class="form-group">
                        <div align="center">
                			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                            {{ link_to_route('problems.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
                        </div>
                    </div>

    {{ Form::close() }}

    @if ($errors->any())
    		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
    @endif

@stop


@section('script-bawah')

    @include('problems/bawah')

@stop


