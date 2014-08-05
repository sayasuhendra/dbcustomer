@extends('layouts.scaffold')

@section('main')

<h1>Data Customer Detail</h1>

<p>{{ link_to_route('customers.show', 'Kembali Ke Daftar Customer') }}</p>

    <div class="box">
        <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
              </div>
              <div class="panel-body">
                    
@if ($customers->count())
			@foreach ($customers as $customer)
				<tr>
					<td>{{{ $customer->customerid }}}</td>
					<td>{{{ $customer->nama }}}</td>
					<td>{{{ $customer->alamat }}}</td>
					<td>{{{ $customer->level }}}</td>
                    <td>{{ link_to_route('customers.edit', 'Edit', array($customer->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('customers.destroy', $customer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
				                    <dl class="dl-horizontal">
					<dt>Coba</dt>
					<dd>{{{ $customer->customerid }}}</dd>
					<dt>Coba</dt>
					<dd>{{{ $customer->nama }}}</dd>
					<dt>Coba</dt>
					<dd>{{{ $customer->alamat }}}</dd>
					<dt>Coba</dt>
					<dd>{{{ $customer->level }}}</dd>
                    </dl>
			@endforeach
@else
	Belum ada data customers
@endif


              </div>
            </div>
        </div>
</div>

@stop
