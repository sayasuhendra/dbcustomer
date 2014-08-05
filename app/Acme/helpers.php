<?php

function errors_for($attribute, $errors)
{
	return $errors->first($attribute, '<span class="error">:message</span>');
}

function link_to_profile($text = 'Profile')
{
    return link_to_route('profile', $text, Auth::user()->username);
}

function link_to_createprofile($text = 'Create Profile')
{
    return link_to_route('profile.create', $text, Auth::user()->username);
}

function link_to_editprofile($text = 'Edit Profile')
{
    return link_to_route('profile.edit', $text, Auth::user()->username);
}