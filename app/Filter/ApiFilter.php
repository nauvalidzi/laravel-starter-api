<?php

namespace App\Filter;

use Illuminate\Http\Request;

class ApiFilter {

    protected $allowedFields = [];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte'=> '<=',
        'ne'=> '!='
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->allowedFields as $parm => $operators) {
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