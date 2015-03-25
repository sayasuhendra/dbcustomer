@extends('layouts.scaffold')


@section('style-atas')

    @include('problems/atas')
    
@stop

@section('main')


<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Edit Data Problem</h1></div>
</div>

{{ Form::model($problem, array('method' => 'PATCH', 'route' => array('problems.update', $problem->id))) }}

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