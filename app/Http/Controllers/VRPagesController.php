<?php namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRCategoriesTranslations;
use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use App\Models\VRResources;
use Illuminate\Routing\Controller;

class VRPagesController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrpages
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     * GET /vrpages
     *
     * @return Response
     */

    public function adminIndex()
    {
        $config['list'] = VRPages::get()->toArray();
        $config['pageTitle'] = trans('app.pages');
        $config['route'] = route('app.pages.create');

        $config['edit'] = 'app.pages.edit';
        $config['delete'] = 'app.pages.delete';
//dd($config);
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
        $config = $this->getFormData();
//        dd($config);
        $config['pageTitle'] = trans('app.pages');
        $config['route'] = route('app.pages.create');

        return view('admin.form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrpages
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();

        $resources = request()->file('file');
        $uploadController = new VRResourcesController();
        $record = $uploadController->upload($resources);

        $data['cover_id'] = $record->id;
        $record = VRPages::create($data);

        $data['record_id'] = $record->id;
        $data['slug'] = str_slug($data['title'], '-');
        VRPagesTranslations::create($data);

        return redirect(route('app.pages.edit', $record->id));

    }

    /**
     * Display the specified resource.
     * GET /vrpages/{id}
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $record = VRPages::find($id)->toArray();
        $record['language_code'] = $record['translation']['language_code'];
        $record['title'] = $record['translation']['title'];
        $record['description_short'] = $record['translation']['description_short'];
        $record['description_long'] = $record['translation']['description_long'];
        $record['path'] = $record['image']['path'];
        $config = $this->getFormData();

        $config['record'] = $record;
        $config['pageTitle'] = trans('app.pages');
        $config['route'] = route('app.pages.update', $id);
        //dd($config);
        return view('admin.form', $config);

//        dd($config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrpages/{id}
     *
     * @param  int $id
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
        }
        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'category_id',
            'options' => VRCategoriesTranslations::where('language_code', '=', $language)->pluck('name', 'record_id')
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'title',
        ];

        $config['fields'][] = [
            'type' => 'file',
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
