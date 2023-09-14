<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display the password reset request view.
     *
     * @return \Inertia\Response
     */
    public function showLinkRequestForm()
    {
        return Inertia::render('Auth/Password/Reset');
    }

    /**
     * Send a password reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return Inertia::render('Home')->with('success', 'Password reset link sent to your email');
            // return response()->json(['message' => trans($response)], JsonResponse::HTTP_OK);
        }

        return back()
            ->withErrors(['email' => trans($response)])
            ->withInput($request->only('email'));
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        //send user back to home page with success message
        // return Inertia::render('Home')->with('success', $response);
        return response()->json(['message' => trans($response)], JsonResponse::HTTP_OK);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['email' => [trans($response)]], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
