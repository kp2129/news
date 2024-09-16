<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QRCode;
use Carbon\Carbon;
use Inertia\Inertia;

class QRCodeController extends Controller
{
    // Generate a new QR code for the user
    public function generateQRCode(Request $request)
    {
        $user = $request->user();
        
        QRCode::where('user_id', $user->id)->delete();

        $qrCode = QRCode::generateForUser($user);

        
        return Inertia::render('QR', [
            'token' => $qrCode->token,
            'expires_at' => $qrCode->expires_at
        ]);
    }

    // Validate the scanned QR code
    public function validateQRCode(Request $request)
    {
        $token = $request->input('token');
        
        // Find the QR code with the given token
        $qrCode = QRCode::where('token', $token)->first();

        // Check if the QR code exists and is still valid
        if (!$qrCode || !$qrCode->isValid()) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired QR code'], 400);
        }

        // Get the user associated with the valid QR code
        $user = $qrCode->user;

        // Return the validated user
        return response()->json(['success' => true, 'user' => $user]);
    }
}
