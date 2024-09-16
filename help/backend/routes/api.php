<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User; // Make sure to import the User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post("/logout", function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    });
});



Route::post('/login', function (Request $request) {
    $request->validate([
        'email' =>'required|email',
        'password' => 'required|min:8',
        'device_name' =>'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken], 200);
});
