<?php

namespace App\Rules;

use App\Models\Applicant;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class VerifyApplicantId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $objApplications = Applicant::where( [ 'id' => $value, 'user_id' => Auth::user()->id ] )->get();

        if( $objApplications->isEmpty() )
            $fail('The :attribute is not available.');

    }
}
