<?php

function errors_for($attribute, $errors)
{
	return $errors->first($attribute, '<span class="error">:message</span>');
}

function link_to_profile($text = ' Profile')
{
    return link_to_route('profile', $text, Auth::user()->username, ['class' => 'icon-user']);
}

function link_to_createprofile($text = 'Create Profile')
{
    return link_to_route('profile.create', $text, Auth::user()->username);
}

function link_to_editprofile($text = 'Edit Profile')
{
    return link_to_route('profile.edit', $text, Auth::user()->username);
}

function link_to_editpassword($text = 'Edit Password')
{
    return link_to_route('editpassword', $text, Auth::user()->username);
}

function link_to_pro()
{
	echo "<a href=";
	if(Auth::user()->profile){
		route('profile');
	} 
	route('profile.create');
	echo "> <i class='icon-user'></i>
	</i> Profile </a>";
}

function mundur($page = 1)
{
	echo '<script type="text/javascript">'
			, 'history.go(-' . $page . ');'
			, 'window.location.reload(true);'
	   , '</script>';
}

function rupiah($uang)
{
	$jadi = number_format($uang ,2,',','.') . " " . "IDR" ;
	return $jadi;
}

function uang($uang)
{
	$jadi = number_format($uang ,2,',','.');
	return $jadi;
}

function hitungWaktu($start, $finish)
{
	$menit = abs((strtotime($finish) - strtotime($start))/60);

	$waktu = "";

	$years = floor($menit / (365*60*24));
	if($years>0) { $waktu = $years . " Thn, "; }
	$months = floor(($menit - $years * 365*60*24) / (30*60*24));
	if($months>0) { $waktu .= $months . " Bln, "; }
	$days = floor(($menit - $years * 365*60*24 - $months*30*60*24)/ (60*24));
	if($days>0) { $waktu .= $days . " Hari, "; }
	$hours = floor(($menit - $years * 365*60*24 - $months*30*60*24 - $days*60*24)/ (60));
	if($hours>0) { $waktu .= $hours . " Jam, "; }
	$minute = floor(($menit - $years * 365*60*24 - $months*30*60*24 - $days*60*24 - $hours*60));
	if($minute>0) { $waktu .= $minute . " Mnt"; }

	return ['waktu' => $waktu, 'menit' => $menit];
}