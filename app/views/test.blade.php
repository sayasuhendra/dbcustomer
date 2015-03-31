@extends('layouts.scaffold')

@section('atas')
	    <style>
	    .imageBox
	    {
	        position: relative;
	        height: 400px;
	        width: 400px;
	        border:1px solid #aaa;
	        background: #fff;
	        overflow: hidden;
	        background-repeat: no-repeat;
	        cursor:move;
	    }

	    .imageBox .thumbBox
	    {
	        position: absolute;
	        top: 50%;
	        left: 50%;
	        width: 200px;
	        height: 200px;
	        margin-top: -100px;
	        margin-left: -100px;
	        box-sizing: border-box;
	        border: 1px solid rgb(102, 102, 102);
	        box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
	        background: none repeat scroll 0% 0% transparent;
	    }

	    .imageBox .spinner
	    {
	        position: absolute;
	        top: 0;
	        left: 0;
	        bottom: 0;
	        right: 0;
	        text-align: center;
	        line-height: 400px;
	        background: rgba(0,0,0,0.7);
	    }


        .container
        {
            position: absolute;
            top: 10%; left: 10%; right: 0; bottom: 0;
        }
        .action
        {
            width: 400px;
            height: 30px;
            margin: 10px 0;
        }
        .cropped>img
        {
            margin-right: 10px;
        }
    </style>
<script type="text/javascript" src="{{ asset('global/plugins/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pages/scripts/cropbox.min.js') }}"></script>
    
@stop

@section('main')

<div class="container">
    <div class="imageBox">
        <div class="thumbBox"></div>
        <div class="spinner" style="display: none">Loading...</div>
    </div>
    <div class="action">
        <input type="file" id="file" style="float:left; width: 250px">
        <input type="button" id="btnCrop" value="Crop" style="float: right">
        <input type="button" id="btnZoomIn" value="+" style="float: right">
        <input type="button" id="btnZoomOut" value="-" style="float: right">
    </div>
    <div class="cropped">

    </div>
</div>

@stop

@section('script')


	<script type="text/javascript">
	$(window).load(function() {
	    var options =
	    {
	        thumbBox: '.thumbBox',
	        spinner: '.spinner',
	        imgSrc: '{{ asset('foto/suhendra.jpg') }}'
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
	        $('.cropped').append('<img src="'+img+'">');
	    })
	    $('#btnZoomIn').on('click', function(){
	        cropper.zoomIn();
	    })
	    $('#btnZoomOut').on('click', function(){
	        cropper.zoomOut();
	    })
	});
	</script>
@stop

