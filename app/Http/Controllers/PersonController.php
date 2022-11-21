<?php

namespace App\Http\Controllers;

use App\Filter\PersonFilter;
use App\Http\Resources\PersonCollection;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $filter = new PersonFilter();

        $queryItems = $filter->transform($request);

        return new PersonCollection(Person::where($queryItems)->paginate(10)->appends($request->query()));
    }

    public function show(Person $person)
    {
        return new PersonResource($person);
    }
}
