<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'company',
        'address1',
        'county',
        'country',
        'postcode',
        'require_dbs_check',
        'applied_for',
        'cv'
    ];

    public function user() {

        return $this->belongsTo( User::class );

    }

}
