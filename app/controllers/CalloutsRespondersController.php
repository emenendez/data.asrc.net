<?php

class CalloutsRespondersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Callout
	 */
	public function index($id)
	{
        return Callout::find($id)->responders()->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Callout
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Callout
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Callout
	 */
	public function show($callout_id, $responder_id)
	{
		return Callout::find($callout_id)->responders()->whereId($responder_id)->get();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Callout
	 */
	public function update($id)
	{
		//
	}

}
