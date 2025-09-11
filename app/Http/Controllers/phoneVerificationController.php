<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PhoneVerificationController extends Controller
{
    public function showVerifyPhone()
    {
        return view('auth.verify-phone');
    }

    public function sendCode(Request $request)
    {
        $user = Auth::user();
        $code = rand(100000,999999);
        $user->phone_verification_code = $code;
        $user->save();

        // NOTE: ici on **simule** l'envoi. Pour production, appeler un SMS provider.
        // Pour debug on met le code en session pour afficher dans la vue (simulation)
        session(['sim_sms_code' => $code]);

        return redirect()->route('auth.show.verifycode')->with('message', 'Code envoyé (simulation).');
    }

    public function showVerifyCode()
    {
        return view('auth.verify-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);
        $user = Auth::user();

        if ($user->phone_verification_code && $user->phone_verification_code == $request->code) {
            $user->phone_verified_at = Carbon::now();
            $user->phone_verification_code = null;
            $user->save();
            return redirect()->route('accueil')->with('success', 'Téléphone vérifié — bienvenue !');
        }

        return back()->withErrors(['code' => 'Code invalide'])->withInput();
    }

    public function skip()
    {
        // l'utilisateur a choisi "plus tard"
        return redirect()->route('accueil')->with('info', 'Vous pouvez vérifier votre téléphone plus tard depuis votre profil.');
    }
}
