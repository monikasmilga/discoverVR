<?php namespace App\Http\Controllers;

use App\Models\VRLanguageCodes;
use Illuminate\Routing\Controller;


class VRLanguageCodesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrlanguagecodes
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
	    $config['list'] = VRLanguageCodes::get()->toArray();
        $config['callToAction'] = 'app.language.edit';
        $config['pageTitle'] = trans('app.language');

//	    dd($config['list']);

		return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrlanguagecodes/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
//		dd(getActiveLanguages());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrlanguagecodes
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrlanguagecodes/{id}
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
	 * GET /vrlanguagecodes/{id}/edit
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
	 * PUT /vrlanguagecodes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
	{
		$data = request()->all();
		$record = VRLanguageCodes::find($id);

		$record->update($data);

		return $record;
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrlanguagecodes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}