<?php

class AjaxController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('ajaxes.index');
	}
	
}
