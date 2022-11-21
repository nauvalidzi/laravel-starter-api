<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $search  = $request->search;

        $address = Address::where(function ($query) use ($search) {
            $query->where('address', 'like', "%{$search}%")
                ->orWhere('city', 'like', "%{$search}%")
                ->orWhere('state', 'like', "%{$search}%")
                ->orWhere('country', 'like', "%{$search}%");
        })->get();

        return response()->json([
            'success' => true,
            'query' => $search,
            'data' => $address,
        ]);
    }

    public function show($id)
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json([
                'success' => true,
                'data' => 'Address not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $address
        ]);
    }
}
