@extends('layouts/scaffold')

@section('main')
	@if ($user->profile)

	<div class="col-md-4">
		<img src="{{ asset('foto/' . $user->profile->foto) }}" class="img-responsive img-thumbnail" alt="{{{ $user->profile->foto }}}">
	</div>

	<div class="col-md-4">
		<h1>{{ $user->username }} <small>{{ $user->profile->panggilan }}</small></h1>
		<div class="bio">
			<p>
				{{ $user->profile->alamat }}
			</p>
		</div>

		<ul class="links">
			<li>{{{ $user->profile->extention }}}</li>
			<li>{{{ $user->profile->hp }}}</li>
			<li>{{{ $user->profile->hp2 }}}</li>
			<li>{{{ $user->profile->wa }}}</li>
			<li>{{{ $user->profile->bbm }}}</li>
			<li><a href="mailto:{{{ $user->profile->email_kantor }}}" target="_top">Kirim ke email kantor</a></li>
			<li><a href="mailto:{{{ $user->profile->email_lain }}}" target="_top">Kirim ke email lain</a></li>
			<li><a href="ymsgr:sendIM?{{{ $user->profile->ym }}}" target="_top">YMku</a></li>
			<li><a href="skype:{{{ $user->profile->skype }}}?call" target="_top">Skype Saya</a></li>
			<li>{{ link_to('http://twitter.com/' . $user->profile->twitter, 'Follow Twitter Saya') }}</li>
			<li>{{ link_to('http://facebook.com/' . $user->profile->facebook, 'Berteman dengan Saya di Facebook') }}</li>
		</ul>
		<div class="bio">
			<p>
				{{ $user->profile->keterangan }}
			</p>
		</div>

		@if ($user->isCurrent())
			{{ link_to_route('user.profile.edit', 'Edit Your Profile', $user->username) }}
		@endif
	</div>
	@else
		<p>No profile yet.</p>
	@endif
@stop