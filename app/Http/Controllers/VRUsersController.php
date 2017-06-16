<?php namespace App\Http\Controllers;

use App\Models\VRRoles;
use App\Models\VRUsers;
use App\Models\VRUsersRolesConnections;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class VRUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrusers
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     * GET /vrusers
     *
     * @return Response
     */
    public function adminIndex()
    {
        $config['title'] = trans('app.users');
        $config['list'] = VRUsers::get()->toArray();

        $config['route'] = route('app.users.create');
        $config['edit'] = 'app.users.edit';
        $config['delete'] = 'app.users.delete';

//        dd($config);

        return view('admin.list', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /vrusers/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $config = $this->getFormData();

        $config['title'] = trans('app.users');
        $config['route'] = route('app.users.create');

        return view('admin.form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrusers
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();
        $data['id'] = Uuid::uuid4();
        $data['password'] = bcrypt($data['password']);

        $record = VRUsers::create($data);


        $data['user_id'] = $record->id;

        VRUsersRolesConnections::create($data);
//dd($record->toArray());
        return redirect()->route('app.users.edit', $record->id);
    }

    /**
     * Display the specified resource.
     * GET /vrusers/{id}
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
     * GET /vrusers/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $record = VRUsers::find($id)->toArray();

        $record['role_id'] = $record['role']['role_id'];


        $config = $this->getFormData();
        $config['record'] = $record;
        $config['title'] = trans('app.users');
        $config['route'] = route('app.users.create');


        return view('admin.form', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrusers/{id}
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
     * DELETE /vrusers/{id}
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
            'type' => 'singleline',
            'key' => 'name',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'email',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'password',
        ];

        $config['fields'][] = [
            'type' => 'singleline',
            'key' => 'phone',
        ];

        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'role_id',
            'options' => VRRoles::pluck('name', 'id')
        ];

        return $config;
    }


}