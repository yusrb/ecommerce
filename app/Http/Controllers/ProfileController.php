<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
    $user = Auth::user();
    return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $validatedData = $request->validated();

        if ($request->hasFile('fp')) {
            $validatedData['fp'] = $request->file('fp')->store('fotoprofil','public');
            if ($user->fp) {
                Storage::delete('public/' . $user->fp);
            }
        }

        $user->update($validatedData);

        return redirect()->route('profile.edit', $user->user_id)->with('success', 'Profil diperbarui');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('home')->with('success','');
    }
}