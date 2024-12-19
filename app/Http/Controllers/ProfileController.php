<?php

namespace App\Http\Controllers;

use App\Contracts\AccountContract;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    protected $accountContract;

    public function __construct(
        AccountContract $accountContract,
    ) {
        $this->accountContract = $accountContract;
    }
    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/EditProfile', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }
    public function changePassword(): Response
    {
        return Inertia::render('Profile/ChangePassword');
    }
    public function deleteAccount(): Response
    {
        return Inertia::render('Profile/DeleteAccount');
    }
    
    /**
     * Update the user's profile information.
     */
    public function updateOrCreateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $accountData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'civil_status' => 'required|string',
            'religion' => 'nullable|string',
            'address' => 'nullable|string',
            'profile' => 'nullable|image|max:5120',
        ]);
        $accountData['birthday'] = \Carbon\Carbon::parse($accountData['birthday'])->format('Y-m-d');

        $user = $request->user();
        $user->fill($accountData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($request->hasFile('profile')) {
            $userSlug = Str::slug($accountData['name'], '-');
            $file = $request->file('profile');
            $filename = $userSlug . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile', $filename, 'public');
            $newProfileUrl = Storage::url($path);

            $existingProfile = $user->profile;
            if ($existingProfile && Storage::exists('public/' . $existingProfile)) {
                Storage::delete('public/' . $existingProfile);
            }

            $accountData['profile'] = $newProfileUrl;
        }

        $this->accountContract->updateOrCreateAccount($accountData);

        // session()->flash('success', 'Profile updated successfully!');

        return redirect()->route('dashboard')->with([
            'success' => 'Profile updated successfully!'
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
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
