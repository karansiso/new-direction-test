<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CvDownloadRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvDownloadController extends BaseController
{

    public function index( $id ) {


        $objApplication = Applicant::where( [ 'id' => $id, 'user_id' => Auth::user()->id ] )->first();

        if( empty( $objApplication ) )
            return $this->sendErrorResponse( [ 'Unauthorized', 'No Data found!' ] );

        $file_contents = base64_decode($objApplication->cv);

        $path = public_path().'/'.html_entity_decode($objApplication->name).'-cv.pdf';

        file_put_contents($path, base64_decode($file_contents));

        $header = [ 'Cache-Control' => 'no-cache private',
                    'Content-Description' => 'File Transfer',
                    'Content-Type' => 'pdf',
                    'Content-Transfer-Encoding' => 'binary'];

        return response()->download($path);

    }
}
