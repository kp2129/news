<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BarcodeController extends Controller
{
    public function processBarcode(Request $request): RedirectResponse
    {
        // Validate the request to ensure 'barcode' field is present
        $request->validate([
            'barcode' => 'required|string',
        ]);

        return Redirect::to('/dashboard');

    }
}
