<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApplicantsSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'nullable',
            'email'             => 'nullable|email',
            'phone'             => 'nullable',
            'company'           => 'nullable',
            'address1'          => 'nullable',
            'county'            => 'nullable',
            'country'           => 'nullable',
            'postcode'          => 'nullable|size:7|size:7',
            'applied_for'       => 'nullable',
            'require_dbs_check' => 'nullable|boolean'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException( response()->json([
            'success'   => false,
            'message'   => 'Validations Errors',
            'data'      => $validator->errors()
        ]) );
    }

    protected function prepareForValidation(): void {

        $this->merge([
            'postcode' => str_replace( ' ', '', $this->get( 'postcode' ) )
        ]);


    }

}
