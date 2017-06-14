<?php namespace App\Http\Controllers;

use App\Models\VRMenu;
use App\Models\VRMenuTranslations;
use Illuminate\Routing\Controller;

class VRMenuController extends Controller
{

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
    public function adminStore()
    {
        $data = request()->all();

//        dd($data);

        $record = VRMenu::create($data);
        $data['record_id'] = $record->id;
        VRMenuTranslations::create($data);

        return redirect()->route('app.menu.edit', [$record->id]);
    }

    /**
     * Display the specified resource.
     * GET /vrmenu/{id}
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
     * GET /vrmenu/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrmenu/{id}
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
     * DELETE /vrmenu/{id}
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

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'name',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'url',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'sequence',
        ];

        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'vr_parent_id',
            'options' => [

            ]
        ];

        $config['fields'][] = [
            'type' => 'checkbox',
            'key' => 'new_window',
            'options' => [
                [
                    'name' => 'new_window',
                    'value' => 1,
                    'title' => trans('app.yes'),
                ],
            ]
        ];

        return $config;
    }

}