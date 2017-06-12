<?php namespace App\Http\Controllers;

use App\Models\VRCategories;
use Illuminate\Routing\Controller;

class VRCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrcategories
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $config['list'] = VRCategories::get()->toArray();
        $config['create'] = 'app.categories.create';
        $config['title'] = trans('app.categories');
        $config['route'] = 'app.categories.create';

        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrcategories/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
        $config['title'] = trans('app.categories');
        $config['route'] = 'app.categories.create';

	    $config['fields'][] = [
	        'type' => 'dropdown',
            'key' => 'language_code',
            'options' => getActiveLanguages()
        ];

	    $config['fields'][] = [
	        'type' => 'singleline',
            'key' => 'name',
        ];

        return view('admin.form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrcategories
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrcategories/{id}
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
	 * GET /vrcategories/{id}/edit
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
	 * PUT /vrcategories/{id}
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
	 * DELETE /vrcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}