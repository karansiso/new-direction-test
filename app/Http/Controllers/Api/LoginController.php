<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{

    public function login( LoginRequest $request ) : JsonResponse {

        $arrValidated = $request->validated();

        if( Auth::attempt( $arrValidated ) ) {

            $user = Auth::user();

            $user->tokens()->delete();

            $arrSuccessData[ 'auth_token' ] = $user->createToken( 'AuthToken' )->plainTextToken;
            $arrSuccessData[ 'name' ]       = $user->name;

            return $this->sendSuccessResponse( $arrSuccessData, 'You logged in successfully!' );

        } else {
            return $this->sendErrorResponse( [ 'Unauthorised' ] );
        }

    }
}
