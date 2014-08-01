<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function redirect(){
		if(Session::has('username')){
			$username = Session::get('username');
		} else {
			return Redirect::to('/')->with('error', 'session not found');
		}
		$userObj = new User();
		$access_status = $userObj->getAccess($username);
		$access_obj = json_decode($access_status);
		if(isset($access_obj->success)){
			return View::make($access_obj->success . '-dashboard');
		} else if(isset($access_obj->error)){
			return Redirect::to('/')->with('error' , $access_obj->error);
		} else {
			return Redirect::to('/')->with('error' , 'something went wrong');
		}
	}
	
	
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
