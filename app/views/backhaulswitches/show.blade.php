@extends('layouts.scaffold')

@section('main')

<h2 align="center">Detail Switches SBP</h2>

<p>{{ link_to_route('backhaulswitches.index', 'Return to all Switches') }}</p>

<table id="tabelswitchdetail" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Jumlah Port FO</th>
			<th>Jumlah Port RJ</th>
			<th>Area</th>
			<th>Lokasi</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $backhaulswitch->nama }}}</td>
			<td>{{{ $backhaulswitch->jenis }}}</td>
			<td>{{{ $backhaulswitch->jumlahportfo }}}</td>
			<td>{{{ $backhaulswitch->jumlahportrj }}}</td>
			<td>{{{ $backhaulswitch->area }}}</td>
			<td>{{{ $backhaulswitch->lokasi }}}</td>
            <td class="ac">
            
                <a href="{{ URL::route('backhaulswitches.edit', array($backhaulswitch->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('backhaulswitches.destroy', $backhaulswitch->id), 'style'=>'display:inline-block')) }}
                    	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop



