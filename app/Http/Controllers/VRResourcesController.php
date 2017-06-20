<?php namespace App\Http\Controllers;

use App\Models\VRResources;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;

class VRResourcesController extends Controller
{

    public function upload(UploadedFile $file)
    {
    $data =
        [
            'size' => $file->getsize(),
            'mime_type' => $file->getMimeType(),
        ];

    $path = 'upload/' . date("Y/m/d/");
    $fileName = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
    $file->move(public_path($path), $fileName);
    $data['path'] = $path . $fileName;

    return VRResources::create($data);
    }
}