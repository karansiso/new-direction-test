<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{


    public function sendSuccessResponse( $data, $message = [] ) {

        $arrResponse = [
            'success'   => true,
            'message'   => $message,
            'data'      => $data,
        ];

        return response()->json( $arrResponse, 200 );
    }

    public function sendErrorResponse( $message = [] ) {

        $arrResponse = [
            'success'   => false,
            'message'   => $message
        ];

        return response()->json( $arrResponse, 200 );
    }
}
