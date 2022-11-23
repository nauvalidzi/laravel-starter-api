<?php

namespace App\Filter;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class PersonFilter extends ApiFilter {

    protected $allowedFields = [
        'firstName' => ['eq'],
        'lastName' => ['eq'],
        'gender' => ['eq']
    ];

    protected $columnMap = [
        'firstName' => 'first_name',
        'lastName' => 'last_name'
    ];
}