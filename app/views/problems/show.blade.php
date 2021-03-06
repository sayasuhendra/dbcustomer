@extends('layouts.scaffold')

@section('main')

<h2 align="center">Detail Problem</h2>

{{ link_to_route('problems.index', 'Tickets Close', [], ['class' => 'btn btn-default', 'type' => 'button']) }}
{{ link_to_route('problemsopen', 'Tickets Open', [], ['class' => 'btn btn-default pull-right', 'type' => 'button']) }}

<br>
<br>

	<div class="portlet box blue-steel">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-bubbles"></i>Data Problems
			</div>
			<div class="tools">
				<a href="{{ URL::route('problems.create') }}"><i class="icon-plus"></i></a>
				<a href="{{ URL::route('problems.edit', array($problem->id)) }}"><i class="icon-pencil"></i></a>
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
					<dt>Trouble Ticket</dt> <dd> {{{ $problem->tt }}} </dd>
					<dt>CSC Name</dt> <dd> {{{ ucwords($problem->csc) }}} </dd>
					<dt>Area</dt> <dd> {{{ $problem->area }}} </dd>
					<dt>Customer Name</dt> <dd> {{{ $problem->customer }}} </dd>
					<dt>Name Site</dt> <dd> {{{ $problem->circuit }}} </dd>
					<dt>Problem Start</dt> <dd> {{{ $problem->start }}} </dd>
					<dt>Problem Finish</dt> <dd> {{{ $problem->finish }}} </dd>
					<dt>Solving Time</dt> <dd> {{{ $problem->waktu }}} </dd>
					<dt>Channel</dt> <dd> {{{ $problem->channel }}} </dd>

					<dt>Segment</dt> <dd> {{{ $problem->segment }}} </dd>
					<dt>Kategori</dt> <dd> {{{ $problem->kategori }}} </dd>
					<dt>Problem</dt> <dd> {{{ $problem->problem }}} </dd>
					<dt>Sub Problem</dt> <dd> {{{ $problem->sub_problem }}} </dd>
					<dt>RFO</dt> <dd> {{{ $problem->rfo }}} </dd>
					<dt>Real Problem</dt> <dd> {{{ $problem->real_problem }}} </dd>
					<dt>Vendor</dt> <dd> {{{ $problem->vendor }}} </dd>
					<dt>Level</dt> <dd> {{{ $problem->level }}} </dd>
					<dt>Keterangan</dt> <dd> {{{ $problem->keterangan }}} </dd>
					<dt>Action</dt> <dd> {{{ $problem->action }}} </dd>
            </dl>
		</div>
	</div>

@stop
