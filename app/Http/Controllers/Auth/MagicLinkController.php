<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Auth\MagicLink;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class MagicLinkController extends Controller
{
    public function sendLink(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        $url = URL::temporarySignedRoute(
            'magic-link.login', now()->addSeconds(60), ['user' => $user->id]
        );

        $notification = new MagicLink(magicUrl: $url);

        Notification::route('mail', $request->email)->notify($notification);

        return back()->with('success', 'A link has been sent to your email address. Please click the link to login');
    }

    public function authenticateUser(Request $request): RedirectResponse
    {
        $user = User::findOrFail($request->user);

        if (! URL::hasValidSignature($request)) {
            return redirect('/login')->with(['error' => 'The link is invalid.']);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        //
    }
}
