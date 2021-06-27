<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return ['status' => trans($response)];
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['email' => trans($response)], 400);
    }

    public function getEmail() {
        return view("auth.forgot-password");
    }
    public function postEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);
        if( $validator->fails() ) {
            return back()->with('error', $validator->errors()->first());
        }

        $user = User::where("email", $request->email)->first();

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        Notification::send($user, new ResetPassword($token, $user));
        // Notification::route('mail', $request->email)->notify(new ResetPassword($token));
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
