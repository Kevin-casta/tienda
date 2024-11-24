<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Pest\Plugins\Profile;

class ProfileController extends Controller
{

    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $users=User::where('first_name', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('users-profile/index', ['users' => $users,
                                        'data'=> $request]);

    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
