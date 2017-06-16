<?php namespace App\Http\Controllers;

use App\Models\VRMenu;
use App\Models\VROrder;
use App\Models\VRUsers;
use Illuminate\Routing\Controller;

class VROrderController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrorder
     *
     * @return Response
     */
    public function adminIndex()
    {
        $config['list'] = VROrder::get()->toArray();
        $config['title'] = trans('app.orders');
        $config['route'] = route ('app.order.create');

        return view('admin.list', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /vrorder/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $config = $this->getFormData();
        $config['title'] = trans('app.orders');
        $config['route'] = route('app.order.create');
//dd($config);
        return view('admin.form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrorder
     *
     * @return Response
     */
    public function adminStore()
    {
        dd(request()->all());
    }

    /**
     * Display the specified resource.
     * GET /vrorder/{id}
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
     * GET /vrorder/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrorder/{id}
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
     * DELETE /vrorder/{id}
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
            'key' => 'status',
            'options' => [
                'pending' => 'pending',
                'canceled' => 'canceled',
                'approved' => 'approved'
            ]
        ];
//                    [
//                        'name' => 'pending',
//                        'value' => 'pending'
//                    ],                    [
//                        'name' => 'canceled',
//                        'value' => 'canceled',
//                    ],                    [
//                        'name' => 'approved',
//                        'value' => 'approved',
//                    ]

        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'user_id',
            'options' => VRUsers::where('id', '=', 'user_id')->pluck('name', 'id'),
        ];

        return $config;
    }

}