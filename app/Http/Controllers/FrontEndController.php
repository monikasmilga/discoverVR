<?php namespace App\Http\Controllers;

use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use Illuminate\Routing\Controller;

class FrontEndController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /frontend
	 *
	 * @return Response
	 */
	public function index()
	{
		return view ('front-end.frontend');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /frontend/create
	 *
	 * @return Response
	 */
	public function showPages($lang, $slug)
	{
	    $data = VRPagesTranslations::where('slug', $slug)->where('language_code', $lang)->with('page')->first()->toArray();

		return view('front-end.pages', $data);
	}


}