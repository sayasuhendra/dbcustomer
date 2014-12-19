@extends('layouts.scaffold')


@section('main')

<h1>Detail Backhaul</h1>

<p>{{ link_to_route('backhauls.index', 'Return to all backhauls') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nama Vendor</th>
			<th>Nama Backhaul</th>
			<th>CirID Backhaul</th>
			<th>Lokasi XConnect</th>
			<th>Switch Terkoneksi</th>
			<th>Port Terkoneksi</th>
			<th>Bandwidth</th>

			@if ( !Auth::user()->hasRole('noc') )
				<th>NRC</th>
				<th>MRC</th>
			@endif

			<th>Start Date</th>
			<th style="width: 10%">Action</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $backhaul->namavendor }}}</td>
			<td>{{{ $backhaul->nama }}}</td>
			<td>{{{ $backhaul->circuitidbackhaul }}}</td>
			<td>{{{ $backhaul->switches->lokasi }}}</td>
			<td>{{{ $backhaul->switchterkoneksi }}}</td>
			<td>{{{ $backhaul->portterkoneksi }}}</td>
			<td>{{{ $backhaul->bandwidth }}} {{{ $backhaul->satuan }}}</td>

			@if ( !Auth::user()->hasRole('noc') )
				<td>{{{ $backhaul->present()->nrc }}}</td>
				<td>{{{ $backhaul->present()->mrc }}}</td>
			@endif
			
			<td>{{{ $backhaul->present()->startDateShow }}}</td>
            
            <td width="60px" class="ac">
            <a href="{{ URL::route('backhauls.show', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
                <a href="{{ URL::route('backhauls.edit', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('backhauls.destroy', $backhaul->id), 'style'=>'display:inline-block')) }}
                    	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
