<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Annonce;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Skill;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $skills = Skill::all(); // Récupérer toutes les compétences
        return view('profile.edit', [
            'user' => $user,
            'skills' => $skills, // Passer les compétences à la vue
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $userData = $request->validated();
    
        // Mise à jour des données de base de l'utilisateur
        $user->fill($userData);
    
        // Vérifie si l'email a été modifié
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        // Enregistrement des modifications de l'utilisateur
        $user->save();
    
        // Récupération des compétences sélectionnées
        $selectedSkills = Skill::whereIn('id', $request->input('skills', []))->get();
    
        // Mise à jour des compétences de l'utilisateur
        $user->skills()->sync($selectedSkills->pluck('id'));
    
        // Redirection avec un message de succès
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

    public function showJobDatingSuggestions()
    {
        if (Auth::check()) {
            
            $user = Auth::user();
    
            $userSkills = $user->skills()->pluck('id')->toArray();
    
            $suggestedAnnonces = Annonce::whereHas('skills', function ($query) use ($userSkills) {
                $query->whereIn('id', $userSkills);
            })->get();
    
            return view('welcome', compact('suggestedAnnonces'));
        } else {
            $annonces = Annonce::latest()->paginate(5);
            return view('welcome', compact('annonces'));
        }
}
}