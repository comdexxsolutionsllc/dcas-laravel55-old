<?php

namespace App\Http\Controllers;

use App\PasswordSecurity;
use Hash;
use Illuminate\Http\RedirectResponse;

class PasswordSecurityController extends Controller
{
    /**
     * @return $this
     */
    public function show2faForm()
    {
        $user = auth()->user();
        $google2fa_url = "";

        if (count($user->passwordSecurity)) {
            $google2fa = app('pragmarx.google2fa');

            $google2fa_url = $google2fa->getQRCodeGoogleUrl(
                env('COMPANY'),
                $user->email,
                $user->passwordSecurity->google2fa_secret
            );
        }

        $data = [
            'user' => $user,
            'google2fa_url' => $google2fa_url
        ];

        return view('auth.2fa')->with(compact('data'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate2faSecret(): RedirectResponse
    {
        $user = auth()->user();

        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // Add the secret key to the registration data
        PasswordSecurity::create([
            'user_id' => $user->id,
            'google2fa_enable' => 0,
            'google2fa_secret' => $google2fa->generateSecretKey(),
        ]);

        return redirect('/2fa')->with('success', "Secret Key is generated, Please verify code to Enable 2FA");
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable2fa(): RedirectResponse
    {
        $user = auth()->user();
        $google2fa = app('pragmarx.google2fa');
        $secret = request()->input('verify-code');
        $valid = $google2fa->verifyKey($user->passwordSecurity->google2fa_secret, $secret);

        if ($valid) {
            $user->passwordSecurity->google2fa_enable = 1;
            $user->passwordSecurity->save();

            return redirect('2fa')->with('success', "2FA is Enabled Successfully.");
        } else {
            return redirect('2fa')->with('error', "Invalid Verification Code, Please try again.");
        }
    }

    /**
     * @return RedirectResponse
     */
    public function disable2fa(): RedirectResponse
    {
        if (!(Hash::check(request()->get('current-password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your password does not matches with your account password. Please try again.");
        }

        $validatedData = request()->validate([
            'current-password' => 'required',
        ]);

        $user = auth()->user();
        $user->passwordSecurity->google2fa_enable = 0;
        $user->passwordSecurity->save();

        return redirect('/2fa')->with('success', "2FA is now Disabled.");
    }
}
