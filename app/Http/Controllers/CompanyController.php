<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $company = Company::where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('catch_phrase', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhere('city', 'like', "%{$search}%")
                ->orWhere('state', 'like', "%{$search}%")
                ->orWhere('country', 'like', "%{$search}%");
        })->get();

        return response()->json([
            'success' => true,
            'query' => $search,
            'data' => $company,
        ]);
    }

    public function show($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'success' => true,
                'data' => 'Company not found.'
            ]);
        }

        return response()->json([
        'success' => true,
        'data' => $company
        ]);
    }
}
