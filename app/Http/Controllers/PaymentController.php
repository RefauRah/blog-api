<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $data = Payment::all();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
