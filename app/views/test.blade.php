@extends('layouts.scaffold')

@section('main')
    <div data-model="MyForm">
        <h1>My Form</h1>

        {{ Form::open(['data-remote', 'data-remote-on-success' => 'remove']) }}
            {{ Form::submit('Click Me') }}
        {{ Form::close() }}
        
        <button data-click="changeButtonText">We'll change the text of this button for fun.</button>
    </div>
@stop

@section('script-bawah')
    <script>
        window.MyForm = {};

        MyForm.remove = function(form) {
            form.fadeOut(500);
        };
        
        MyForm.changeButtonText = function(button) {
            button.text('Changed!');
        };
    </script>
@stop