@extends('layouts.scaffold')

@section('main')

<h2 align="center">Detail Amat</h2>

<p>{{ link_to_route('amats.index', 'Return to all amats', [], ['class' => 'btn btn-default', 'type' => 'button']) }}</p>

<div class="col-md-6 col-sm-6">
    <div class="portlet box red-sunglo">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-notebook"></i>Data Amats
            </div>
            <div class="tools">
                <a href="{{ URL::route('amats.create') }}"><i class="icon-plus"></i></a>
                <a href="{{ URL::route('amats.edit', array($amat->id)) }}"><i class="icon-pencil"></i></a>
                <a href="" class="collapse">
                </a>
                <a href="" class="fullscreen">
                </a>
                <a href="" class="remove">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <dl class="dl-horizontal">

                <dt>Contoh</dt> <dd> {{{ $amat->contoh }}} </dd>

            </dl>
        </div>
    </div>
</div>

@stop