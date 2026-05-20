<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PROFIL SISWA
    |--------------------------------------------------------------------------
    */

    public function edit(Request $request): View
    {
        return view('siswa.profil.index', [
            'user' => $request->user(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFIL
    |--------------------------------------------------------------------------
    */

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nim' => 'required|numeric|digits_between:4,20|unique:users,nim,' . auth()->id(),

            'password' => 'nullable|min:6|confirmed',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;

        // upload foto
        if($request->hasFile('foto')){

            // hapus foto lama
            if($user->foto){

                Storage::disk('public')->delete($user->foto);

            }

            $fotoPath = $request->file('foto')
                ->store('foto-profil', 'public');

            $user->foto = $fotoPath;

        }

        // update password
        if($request->filled('password')){

            $user->password = bcrypt($request->password);

        }

        $user->save();

        auth()->setUser($user->fresh());

        return redirect()
            ->route('siswa.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS AKUN
    |--------------------------------------------------------------------------
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