<?php

namespace App\Http\Controllers;

use App\Filter\PersonFilter;
use App\Http\Requests\StorePersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $filter = new PersonFilter();
        $queryItems = $filter->transform($request);

        $person = Person::where($queryItems);

        if ($request->query('includeAddress')) {
            $person = $person->with('address');
        }

        return PersonResource::collection($person->paginate(10)->appends($request->query()));
    }

    public function show(Person $person)
    {
        if (request()->query('includeAddress')) {
            $person = Person::with('address')->find($person->id);
        }

        return PersonResource::make($person);
    }

    public function store(StorePersonRequest $request)
    {
        // $input = $request->only([
        //     'title',
        //     'first_name',
        //     'last_name',
        //     'gender',
        //     'phone',
        //     'email',
        //     'joined',
        //     'bio'
        // ]);

        // $rules = [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'gender' => 'required',
        //     'email' => 'required|unique:people,email'
        // ];

        // $validate = Validator::make($input, $rules);

        // if ($validate->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $validate->errors($validate)
        //     ]);
        // }

        $person = Person::create([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => ucwords($request->gender),
            'phone' => $request->phone,
            'email' => $request->email,
            'joined' => $request->joined,
            'bio' => $request->bio
        ]);

        return PersonResource::make($person);
    }
}
