@extends('layouts/scaffold')

@section('main')

	@if ($user->profile)
	
	<div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title pull-left" align="center">Data Lengkap {{ $user->nama_lengkap }}</h3>
		  <div class="clearfix"></div>
		</div>
	</div>

	<div class="col-md-3">
		<img src="{{ asset('foto/' . $user->profile->foto) }}" class="img-responsive img-thumbnail" alt="{{{ $user->profile->foto }}}">
	</div>


    <div class="col-md-4">
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
			    <dt>Keterangan</dt>
			    <dd>{{{ $user->profile->keterangan }}}</dd>
                </dl>
          </div>
        </div>
    </div>


    <div class="col-md-5">
        <div class="panel panel-primary">		              
          <div class="panel-body">
			    <dl class="dl-horizontal">
			    <dt>Alamat</dt>
			    <dd>{{{ $user->profile->alamat }}}</dd>
			    <dt>Email Kantor</dt>
			    <dd><a href="mailto:{{{ $user->profile->email_kantor }}}" target="_top">{{{ $user->profile->email_kantor }}}</a></dd>
			    <dt>Email Lain</dt>
			    <dd><a href="mailto:{{{ $user->profile->email_lain }}}" target="_top">{{{ $user->profile->email_lain }}}</a></dd>
			    <dt>Yahoo Messenger</dt>
			    <dd><a href="ymsgr:sendIM?{{{ $user->profile->ym }}}" target="_top">{{{ $user->profile->ym }}}</a></dd>
			    <dt>Skype</dt>
			    <dd><a href="skype:{{{ $user->profile->skype }}}?call" target="_top">{{{ $user->profile->skype }}}</a></dd>
			    <dt>Twitter</dt>
			    <dd>{{ link_to('http://twitter.com/' . $user->profile->twitter, 'http://twitter.com/' . $user->profile->twitter) }}</dd>
			    <dt>Facebook</dt>
			    <dd>{{ link_to('http://facebook.com/' . $user->profile->facebook, 'http://facebook.com/' . $user->profile->facebook) }}</dd>

                </dl>
          </div>
        </div>
        @if ($user->isCurrent())
    		{{ link_to_route('user.profile.edit', 'Edit Your Profile', $user->username, ['class' => 'btn btn-primary pull-right']) }}
    	@endif
    </div>


		
	</div>
	@else
		<p>No profile yet.</p>
	@endif
@stop