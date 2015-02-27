@extends('layouts.scaffold')

@section('main')

<h2 align="center">Detail Problem</h2>

<p>{{ link_to_route('problems.index', 'Return to all problems', [], ['class' => 'btn btn-default', 'type' => 'button']) }}</p>

		<div class="col-md-6">
            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Problems</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">

							<dt>Tt</dt> <dd> {{{ $problem->tt }}} </dd>
				<dt>Csc</dt> <dd> {{{ $problem->csc }}} </dd>
				<dt>Area</dt> <dd> {{{ $problem->area }}} </dd>
				<dt>Customer_id</dt> <dd> {{{ $problem->customer_id }}} </dd>
				<dt>Start</dt> <dd> {{{ $problem->start }}} </dd>
				<dt>Finish</dt> <dd> {{{ $problem->finish }}} </dd>
				<dt>Jam</dt> <dd> {{{ $problem->jam }}} </dd>
				<dt>Menit</dt> <dd> {{{ $problem->menit }}} </dd>
				<dt>Channel</dt> <dd> {{{ $problem->channel }}} </dd>
				<dt>Segment</dt> <dd> {{{ $problem->segment }}} </dd>
				<dt>Kategori</dt> <dd> {{{ $problem->kategori }}} </dd>
				<dt>Problem</dt> <dd> {{{ $problem->problem }}} </dd>
				<dt>Sub_problem</dt> <dd> {{{ $problem->sub_problem }}} </dd>
				<dt>Rfo</dt> <dd> {{{ $problem->rfo }}} </dd>
				<dt>Real_problem</dt> <dd> {{{ $problem->real_problem }}} </dd>
				<dt>Vendor</dt> <dd> {{{ $problem->vendor }}} </dd>
				<dt>Status</dt> <dd> {{{ $problem->status }}} </dd>
				<dt>Level</dt> <dd> {{{ $problem->level }}} </dd>
				<dt>Keterangan</dt> <dd> {{{ $problem->keterangan }}} </dd>
                    <td class="ac"  width="100px">
                    <a href="{{ URL::route('problems.show', array($problem->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>
                            <a href="{{ URL::route('problems.edit', array($problem->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('problems.destroy', $problem->id), 'style'=>'display:inline-block')) }}
                                    {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
                            {{ Form::close() }}
                    </td>

	                    </dl>
	              </div>
            </div>
        </div>

@stop
