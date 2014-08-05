@extends('layouts.scaffold')

@section('style-atas')

<style>
a:hover {
 cursor:pointer;
}

</style>

@stop

@section('script-atas')

<!-- google chart -->

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Customer', 'Margin per Circuit'],
          ['Site 1',     11],
          ['Site 2', 2],
          ['Site 3',    7]
        ]);

        var options = {
          title: 'Data Margin Customer Ini',
          is3D: true,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>

@stop

@section('main')

<h1 align="center">Data Customer Detail</h1>
<p>{{ link_to_route('customers.index', 'Kembali Ke Daftar Customer') }}</p>
    <div class="box">
        <div class="container">

	        <div class="col-md-7">
	            <div class="panel panel-default">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Customer {{{ $customer->nama }}}</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
						<dt>Customer ID</dt>
						<dd>{{{ $customer->customerid }}}</dd>
						<dt>Nama Perusahaan</dt>
						<dd>{{{ $customer->nama }}}</dd>
						<dt>Alamat Perusahaan</dt>
						<dd>{{{ $customer->alamat }}}</dd>
						<dt>Level Customer</dt>
						<dd>{{{ $customer->level }}}</dd>
	                    </dl>
	              </div>
	            </div>
	        </div>

	        <div class="col-md-5">
	            <div class="panel panel-default">
	              <div class="panel-heading">
	                <h3 class="panel-title">Daftar Contact Customer {{{ $customer->nama }}}</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
							@foreach ($contacts as $contact)
								<dt>Contact Bagian {{{ $contact->bagian }}}</dt>
								<dd><a id="contactButton{{{ $contact->id }}}" data-toggle="tooltip" data-placement="right" title="{{{ $contact->telepon }}}" data-content="{{{ $contact->email }}}"> {{{ $contact->cp }}} </a></dd>
							@endforeach
	                    </dl>
	              </div>
	            </div>
	        </div>

	        <div class="col-md-12">
	        	<table id="datasbp" class="table table-striped table-bordered">
	        		<thead>
	        			<tr>
	        				<th>Circuitid</th>
	        				<th>Namasite</th>
	        				<th>Alamat</th>
	        				<th>Layanan</th>
	        				<th>Bandwidth</th>
	        				<th>Circuit ID Backhaul</th>
	        				<th>Circuit ID Vendor</th>
	        				<th>Area</th>
	        				<th>Status</th>
	        				<th width="70px">Pilih Action</th>
	        			</tr>
	        		</thead>
            @foreach ($circuits as $circuit)


            		<tbody>
            				<tr>
            					<td>{{{ $circuit->circuitid }}}</td>
            					<td> <a id="myButton" data-toggle="tooltip" data-placement="right" title="" data-original-title="Isinya ini bukan"> {{{ $circuit->namasite }}} </a></td>
            					<td>{{{ $circuit->alamat }}}</td>
            					<td>{{{ $circuit->layanan }}}</td>
            					<td>{{{ $circuit->bandwidth }}}</td>
            					<td>{{{ $circuit->circuitidbackhaul }}}</td>
            					<td>{{{ $circuit->circuitidlastmile }}}</td>
            					<td>{{{ $circuit->area }}}</td>
            					<td>
                                    @if ( $circuit->status == 'Aktif' )
                                        <span class="label label-success">{{{ $circuit->status }}}</span>
                                    @elseif ( $circuit->status == 'Terminate' )
                                        <span class="label label-important">{{{ $circuit->status }}}</span>
                                    @elseif ( $circuit->status == 'Suspend' )
                                        <span class="label label-warning">{{{ $circuit->status }}}</span>
                                    @endif
                                </td>
			                    <td class="ac">
				                    <a href="{{ URL::route('costumercircuits.edit', array($customer->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
				                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $customer->id), 'style'=>'display:inline-block')) }}
				                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm')) }}
				                    {{ Form::close() }}
					            </td>
            				</tr>
            		</tbody>
            		 @endforeach
            	</table>

           

</div>
</div>



    <div id="piechart" style="width: 900px; height: 500px;"></div>

@stop


@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#datasbp').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

<script type="text/javascript">
	@foreach ($contacts as $contact)
	$('#contactButton{{{ $contact->id }}}').popover();
	@endforeach
	$('#myButton').popover();
</script>

@stop
