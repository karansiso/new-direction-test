<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantsSearchRequest;
use App\Http\Resources\ApplicantsResource;
use App\Models\Applicant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantsController extends BaseController
{

    /**
     * Returns the list of user applications with and without search criteria
    */
    public function index( ApplicantsSearchRequest $request ) : JsonResponse {

        $arrValidated = array_filter( $request->validated() );

        $objApplications = Applicant::where( 'user_id', Auth::user()->id );

        if( !empty( $arrValidated ) ) {

            foreach ( $arrValidated as $param => $value ):
                $objApplications = $objApplications->where( $param, 'like', '%'.$value.'%');
            endforeach;

        }

        $objApplications = $objApplications->get();

        return $this->sendSuccessResponse( ApplicantsResource::collection( $objApplications )->resource, 'application list');

        return $this->sendErrorResponse( [ 'No record found!'] );

    }

}
