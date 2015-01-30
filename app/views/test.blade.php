@extends('layouts.scaffold')

@section('script-atas')

    <script type="text/javascript" src="{{asset('assets/js/angular.min.js')}}"></script>

@stop

@section('main')

{{{ $user }}}
{{{ $uang }}}
@{{ {{{ $uang }}} | currency:"" }}

<!--     <div data-model="MyForm">
        <h1>My Form</h1>

        {{ Form::open(['data-remote', 'data-remote-on-success' => 'remove']) }}
            {{ Form::submit('Click Me') }}
        {{ Form::close() }}
        
        <button data-click="changeButtonText">We'll change the text of this button for fun.</button>
    </div> -->
@stop

@section('script-bawah')
    <script>
        window.MyForm = {};

        MyForm.remove = function(terserah) {
            terserah.fadeOut(500);
        };
        
        MyForm.changeButtonText = function(bebas) {
            bebas.text('Changed!');
        };
    </script>
@stop