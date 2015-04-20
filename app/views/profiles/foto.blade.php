@extends('layouts.scaffold')

@section('atas')
	    <style>
		    .imageBox {
		        position: relative;
		        width: 350px;
		        height: 400px;
		        border:1px solid #aaa;
		        background: #fff;
		        overflow: hidden;
		        background-repeat: no-repeat;
		        cursor:move;
		    }

		    .imageBox .thumbBox {
		        position: absolute;
		        top: 29%;
		        left: 25%;
		        width: 250px;
		        height: 300px;
		        margin-left: -40px;
		        margin-top: -60px;
		        box-sizing: border-box;
		        border: 1px solid rgb(102, 102, 102);
		        box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
		        background: none repeat scroll 0% 0% transparent;
		    }

		    .imageBox .spinner {
		        position: absolute;
		        top: 0;
		        left: 0;
		        bottom: 0;
		        right: 0;
		        text-align: center;
		        line-height: 400px;
		        background: rgba(0,0,0,0.7);
		    }

	        .container {
	            position: absolute;
	            top: 10%; left: 10%; right: 0; bottom: 0;
	        }

	        .action {
	            width: 350px;
	            height: 30px;
	            margin: 10px 0;
	        }

	        .cropped>img {
	            margin-right: 10px;
	        }
	    </style>
    </style>
@stop

@section('main')

<div class="col-md-12">
<div class="row">
<div class="col-md-6">
    <div class="imageBox">
        <div class="thumbBox"></div>
        <div class="spinner" style="display: none">Loading...</div>
    </div>
    <div class="action">
        <input type="file" id="file" style="float:left; width: 260px">
        <input type="button" id="btnCrop" value="Crop" style="float: right">
        <input type="button" id="btnZoomIn" value="+" style="float: right">
        <input type="button" id="btnZoomOut" value="-" style="float: right">
    </div>
</div>
<div class="col-md-6">
 {{ Form::open(['route'=> ['profile.simpan', $user->username], 'files' => true]) }}


 {{-- {{ Form::text('foto', null, ['id' => 'foto'])}} --}}
		
	    <div class="cropped">

	    </div>

		
 {{ Form::close() }}
    </div>
</div>
</div>

</body>
</html>

@stop

@section('script')

<script src="{{ asset('cropbox/require.js') }}"></script>
<script>
    require.config({
        baseUrl: "{{ asset('cropbox/') }}",
        paths: {
            jquery: 'jquery-1.11.1.min',
            cropbox: 'cropbox'
        }
    });
    require( ["jquery", "cropbox"], function($) {
        var options =
        {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: '{{ ($user->profile->foto) ? asset('foto/' . $user->profile->foto) : asset('foto/noimg.png') }}'
        }
        var cropper = $('.imageBox').cropbox(options);
        $('#file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = $('.imageBox').cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        })
        $('#btnCrop').on('click', function(){
            var img = cropper.getDataURL();
            // $.post('{{ link_to_route('profile.simpan', Auth::user()->username) }}', {foto: img}, function(e){
            // 	console.log(e);

            // 	// $('.cropped').append('<img src="'+img+'">');

            // });
            $('.hasil').remove();
            $('.cropped').append('<div class="hasil"> <input type="hidden" name="foto" value="'+img+'"> <img src="'+img+'"> <br> <br> <button type="submit" class="btn btn-primary">Upload Foto</button> </div>');
            console.log(img);
        })
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        })
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        })
        }
    );
</script>

@stop

