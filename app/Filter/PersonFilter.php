<?php

namespace App\Filter;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class PersonFilter extends ApiFilter {

    protected $allowrdFields = [
        'firstName' => ['eq'],
        'lastName' => ['eq'],
    ];

    protected $columnMap = [
        'firstName' => 'first_name',
        'lastName' => 'last_name'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'ne' => '!='
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->allowrdFields as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}