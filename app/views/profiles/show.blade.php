@extends('layouts/scaffold')

@section('main')

	@if ($user->profile)
	
	<div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title pull-left" align="center">Data Lengkap {{ $user->nama_lengkap }}</h3>
		  <div class="clearfix"></div>
		</div>
	</div>

	<div class="col-md-2">
		<img src="{{ asset('foto/' . $user->profile->foto) }}" class="img-responsive img-thumbnail" alt="{{{ $user->profile->foto }}}">
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
				<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;">
			</div>
			<div>
				<span class="btn default btn-file">
				<span class="fileinput-new">
				Select image </span>
				<span class="fileinput-exists">
				Change </span>
				<input type="file" name="...">
				</span>
				<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
				Remove </a>
			</div>
		</div>
	</div>


    <div class="col-md-5">
        <div class="panel panel-primary">		              
          <div class="panel-body">
			    <dl class="dl-horizontal">
			    <dt>Panggilan</dt>
			    <dd>{{{ $user->profile->panggilan }}}</dd>
			    <dt>Extention</dt>
			    <dd>{{{ $user->profile->extention }}}</dd>
			    <dt>Whatsapp</dt>
			    <dd>{{{ $user->profile->wa }}}</dd>
			    <dt>PIN BBM</dt>
			    <dd>{{{ $user->profile->bbm }}}</dd>
			    <dt>Handphone</dt>
			    <dd>{{{ $user->profile->hp }}}</dd>
			    <dt>Handphone 2</dt>
			    <dd>{{{ $user->profile->hp2 }}}</dd>
			    <dt>Email Kantor</dt>
			    <dd><a href="mailto:{{{ $user->email }}}" target="_top">{{{ $user->email }}}</a></dd>
			    <dt>Email Lain</dt>
			    <dd><a href="mailto:{{{ $user->profile->email_lain }}}" target="_top">{{{ $user->profile->email_lain }}}</a></dd>
			    <dt>Yahoo Messenger</dt>
			    <dd><a href="ymsgr:sendIM?{{{ $user->profile->ym }}}" target="_top">{{{ $user->profile->ym }}}</a></dd>

                </dl>
          </div>
        </div>
    </div>


    <div class="col-md-5">
        <div class="panel panel-primary">		              
          <div class="panel-body">
			    <dl class="dl-horizontal">
			    <dt>Level</dt>
			    <dd> {{{ $user->level }}} </dd>
			    <dt>Bagian</dt>
			    <dd> {{{ $user->bagian }}} </dd>
			    <dt>Area</dt>
			    <dd> {{{ $user->area }}} </dd>
			    <dt>Skype</dt>
			    <dd><a href="skype:{{{ $user->profile->skype }}}?call" target="_top">{{{ $user->profile->skype }}}</a></dd>
			    <dt>Twitter</dt>
			    <dd>{{ ($user->profile->twitter) ? link_to('http://twitter.com/' . $user->profile->twitter, $user->profile->twitter ) : "" }}</dd>
			    <dt>Facebook</dt>
			    <dd>{{ ($user->profile->facebook) ? link_to('http://facebook.com/' . $user->profile->facebook, $user->profile->facebook) : "" }}</dd>
			    <dt>Alamat</dt>
			    <dd>{{{ $user->profile->alamat }}}</dd>
			    <dt>Keterangan</dt>
			    <dd>{{{ $user->profile->keterangan }}}</dd>

                </dl>
          </div>
        </div>
    		{{ link_to_route('user.profile.index', 'Back To Contact List', null, ['class' => 'btn btn-default']) }}
        @if ($user->isCurrent())
    		{{ link_to_route('user.profile.edit', 'Edit Your Profile', $user->username, ['class' => 'btn btn-primary pull-right']) }}
    	@endif
    </div>


		
	</div>
	@else
		<p>No profile yet.</p>
	@endif
@stop