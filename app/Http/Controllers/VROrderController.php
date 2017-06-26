<?php namespace App\Http\Controllers;

use App\Models\VRMenu;
use App\Models\VROrder;
use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use App\Models\VRUsers;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTimeZone;
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
        $config['pageTitle'] = trans('app.orders');
        $config['route'] = route('app.order.create');

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
        $config['pageTitle'] = trans('app.orders');
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
        $data = request()->all();
        VROrder::create($data);

        return redirect(route('app.order.index'));
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
    public function adminEdit($id)
    {
        $record = VROrder::find($id)->toArray();
        $config['record'] = $record;
        $config['pageTitle'] = trans('app.oder');
        $config['route'] = route('app.order.update', $id);

        return view('admin.form', $config);


    }

    /**
     * Update the specified resource in storage.
     * PUT /vrorder/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        $data = request()->all();
        $record = VROrder::find($id);
        $record->update($data);
        return redirect(route('app.order.index'));
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
        VROrder::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
    }

    public function getVRRoomsWithCategories()
    {

        $r = VRPages::getTableName();
        $t = VRPagesTranslations::getTableName();

        return VRPages::where('category_id', '=', 'vr_rooms')->join($t, "$r.id", '=', "$t.record_id")->pluck("$t.title", "$r.id")->toArray();


    }

    public function getFormData()
    {
        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'status',
            'options' => [
                'pending' => trans('app.pending'),
                'canceled' => trans('app.canceled'),
                'approved' => trans('app.approved')
            ]
        ];

        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'user_id',
            'options' => VRUsers::pluck('email', 'id'),
        ];

        $options = [];
        $now = Carbon::now();
        $end_data = Carbon::createFromDate()->addDay(14);
        for ($option = $now; $option->lte($end_data); $option->addDay()) {
            $options[] = $option->format('Y-m-d');
        }

        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'time',
            'options' => $options,
        ];

        $config['fields'][] = [
            'type' => 'dropdown',
            'key' => 'experience_id',
            'options' => $this->getVRRoomsWithCategories(),
        ];


        return $config;
    }

}