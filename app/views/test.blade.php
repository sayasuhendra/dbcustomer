@extends('layouts.scaffold')

@section('script-atas')

    <script type="text/javascript" src="{{asset('assets/js/angular.min.js')}}"></script>

@stop

@section('main')

        <div class="form-group">
            {{ Form::label('ujicoba', 'ujicoba:') }}
            {{ Form::text('ujicoba', null, ['class' => 'form-control']) }}
        </div>

@stop