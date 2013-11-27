<?php

class IncidentsRespondersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		return DB::table('responders')
			->whereIn('callout_id', Incident::find($id)->callouts()->lists('id'))
			->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($incident_id, $responder_id)
	{
		return DB::table('responders')
			->whereIn('callout_id', Incident::find($incident_id)->callouts()->lists('id'))
			->whereId($responder_id)
			->get();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

}
