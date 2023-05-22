<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'company'           => $this->company,
            'address1'          => $this->address1,
            'county'            => $this->county,
            'country'           => $this->country,
            'postcode'          => $this->postcode,
            'applied_for'       => $this->applied_for,
            'require_dbs_check' => $this->require_dbs_check,
            'cv'                => route('download.cv', [ $this->id ] )
        ];
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    }



}
