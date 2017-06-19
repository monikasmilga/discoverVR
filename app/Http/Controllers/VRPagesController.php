<?php namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRCategoriesTranslations;
use App\Models\VRPages;
use Illuminate\Routing\Controller;

class VRPagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrpages
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}	/**
	 * Display a listing of the resource.
	 * GET /vrpages
	 *
	 * @return Response
	 */

	public function adminIndex()
	{
	    $config['list'] =VRPages::get()->toArray();
	    $config['title'] = trans('app.pages');
        $config['route'] = route('app.pages.create');

        $config['edit'] = 'app.pages.edit';
        $config['delete'] = 'app.pages.delete';

        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrpages/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
		$config= $this->getFormData();
        $config['title'] = trans('app.pages');
        $config['route'] = route('app.pages.create');

        return view('admin.form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrpages
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrpages/{id}
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
	 * GET /vrpages/{id}/edit
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
	 * PUT /vrpages/{id}
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
	 * DELETE /vrpages/{id}
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

        $language = request('language_code');
        if ($language == null) {
            $language = app()->getLocale();

            $config['fields'][] = [
                'type' => 'dropdown',
                'key' => 'category_id',
                'options' => VRCategoriesTranslations::where('language_code', '=', $language)->pluck('name', 'id')
            ];

            $config['fields'][] = [
                'type' => 'singleline',
                'key' => 'title',
            ];

            $config['fields'][] = [
                'type' => 'singleline',
                'key' => 'cover_id'
            ];


            $config['fields'][] = [
                'type' => 'textarea',
                'key' => 'description_short',
            ];


            $config['fields'][] = [
                'type' => 'textarea',
                'key' => 'description_long',
            ];

            return $config;
        }
    }
}