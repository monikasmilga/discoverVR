<?php namespace App\Http\Controllers;

use App\Models\VRMenu;
use Illuminate\Routing\Controller;

class VRMenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrmenu
	 *
	 * @return Response
	 */
	public function adminIndex()
	{

        $config['list'] = VRMenu::get()->toArray();

        $config['create'] = 'app.menu.create';
        $config['edit'] = 'app.menu.edit';
        $config['delete'] = 'app.menu.delete';

        $config['title'] = trans('app.menu');
        $config['route'] = route('app.menu.create');



        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrmenu/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
        $config = $this->getFormData();
        $config['title'] = trans('app.menu');
        $config['route'] = route('app.menu.create');

        return view('admin.form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrmenu
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrmenu/{id}
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
	 * GET /vrmenu/{id}/edit
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
	 * PUT /vrmenu/{id}
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
	 * DELETE /vrmenu/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function getFormData()
    {
        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'language_code',
            'options' => getActiveLanguages()
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'name',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'url',
        ];

        $config['fields'][] = [
            'type' => 'checkbox',
            'key' => 'new_window',
            'options' => [
                'key' => 'value'
            ]
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'sequence',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'vr_parent_id',
        ];

        return $config;
    }

}