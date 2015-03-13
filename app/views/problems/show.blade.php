@extends('layouts.scaffold')

@section('main')

<h2 align="center">Detail Problem</h2>

<p>{{ link_to_route('problems.index', 'Return to all problems', [], ['class' => 'btn btn-default', 'type' => 'button']) }}</p>

<div class="col-md-6 col-sm-6">

	<div class="portlet box red-sunglo">
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
			<div class="row">
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
                </dl>
	      	</div>
	    </div>
	</div>
</div>

@stop
