@extends('layouts.scaffold')


@section('main')

<h1>Detail Layanan Lain</h1>

<p>{{ link_to_route('layanans.index', 'Return to all layanans') }}</p>

	<table id="tabellayanan" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama Vendor</th>
				<th>Nama Layanan</th>
				<th>Start Date</th>
				<th>Keterangan</th>

				@if ( !Auth::user()->hasRole('noc') )
					<th>NRC</th>
					<th>MRC</th>
				@endif
				
				<th width="100px">Action</th>
			</tr>
		</thead>

		<tbody>
				<tr>
					<td>{{{ $layanan->namavendor }}}</td>
					<td>{{{ $layanan->nama }}}</td>
					<td>{{{ $layanan->activated_at }}}</td>
					<td>{{{ $layanan->keterangan }}}</td>

					@if ( !Auth::user()->hasRole('noc') )
						<td>{{{ $layanan->nrc  }}} 
						{{{ $layanan->currency }}}
						</td>
						<td>{{{ $layanan->mrc  }}} 
						{{{ $layanan->currency }}}</td>
					@endif
                    
                    <td width="60px" class="ac">
                    <a href="{{ URL::route('layanans.show', array($layanan->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    <a href="{{ URL::route('layanans.edit', array($layanan->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('layanans.destroy', $layanan->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}
		            </td>
				</tr>
		</tbody>
	</table>

@stop
