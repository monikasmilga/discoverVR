<?php namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRCategoriesTranslations;
use Illuminate\Routing\Controller;

class VRCategoriesController extends Controller
{

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
        $config['edit'] = 'app.categories.edit';
        $config['delete'] = 'app.categories.delete';

        $config['pageTitle'] = trans('app.categories');
        $config['route'] = route('app.categories.create');



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
        $config = $this->getFormData();
        $config['pageTitle'] = trans('app.categories');
        $config['route'] = route('app.categories.create');

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
     * Store a newly created resource in storage.
     * POST /vrcategories
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();
        $record = VRCategories::create();
        $data['record_id'] = $record->id;
        VRCategoriesTranslations::create($data);

        return redirect()->route('app.categories.edit', [$record->id]);
    }

    /**
     * Display the specified resource.
     * GET /vrcategories/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrcategories/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrcategories/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $record=VRCategories::find($id)->toArray();
        $record['language_code'] = $record['translation']['language_code'];
        $record['name'] = $record['translation']['name'];

        $config = $this->getFormData();
        $config['record']=$record;
        $config['pageTitle'] = $id;
        $config['route'] = route('app.categories.create');

//        dd($record);

        return view('admin.form', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrcategories/{id}
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function adminDestroy($id)
    {

        VRCategoriesTranslations::destroy(VRCategoriesTranslations::where('record_id', $id)->pluck('id')->toArray());
        VrCategories::destroy($id);

        return ["success" => true, "id" => $id];


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

        return $config;
    }
}