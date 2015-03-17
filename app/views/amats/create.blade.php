@extends('layouts.scaffold')

@section('main')

<div class="col-md-6 col-md-offset-3">

<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Buat Data Baru Amat</h1></div>
</div>

{{ Form::open(array('route' => 'amats.store')) }}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-horizontal">

                                <div class="form-group">
                    {{ Form::label('contoh', 'Contoh:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('contoh', null, ['class' => 'form-control', 'id' => 'contoh']) }}
                    </div>
                </div>


                <div class="form-group">
                    <div align="center">
            			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                        {{ link_to_route('amats.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop


@section('script-bawah')

    <script type="text/javascript">

        $(document).ready(function(){

            $("#").select2();

        });

    </script>

@stop


