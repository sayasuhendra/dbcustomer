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