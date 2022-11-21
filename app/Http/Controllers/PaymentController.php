<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $payment = Payment::where(function ($query) use ($search) {
            $query->where('type', 'like', "%{$search}%")
                ->orWhere('card_number', 'like', "%{$search}%")
                ->orWhere('swift', 'like', "%{$search}%");
        })->get();

        return response()->json([
            'success' => true,
            'query' => $search,
            'data' => $payment,
        ]);
    }

    public function show($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json([
                'success' => true,
                'data' => 'Payment not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $payment
        ]);
    }
}
