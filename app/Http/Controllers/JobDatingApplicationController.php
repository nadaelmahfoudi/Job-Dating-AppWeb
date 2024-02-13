<?php

namespace App\Http\Controllers;

use App\Models\JobDatingOffer;
use App\Models\JobDatingApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobDatingApplicationController extends Controller
{

    
        public function apply(Request $request, $offerId) {
            // Vérifier si l'utilisateur est authentifié
            if (Auth::check()) {
                // Récupérer l'utilisateur actuel
                $user = Auth::user();
        
                // Vérifier si l'utilisateur a déjà postulé à cette offre
                if ($user->jobDatingApplications()->where('job_dating_offer_id', $offerId)->exists()) {
                    // Rediriger l'utilisateur avec un message d'erreur
                    return redirect()->back()->with('error', 'Vous avez déjà postulé à cette offre !');
                }
        
                // Enregistrer la candidature dans la base de données
                $application = new JobDatingApplication();
                $application->user_id = $user->id;
                $application->job_dating_offer_id = $offerId;
                $application->save();
        
                // Rediriger l'utilisateur avec un message de succès
                return redirect()->back()->with('success', 'Votre candidature a été envoyée avec succès !');
            } else {
                // Rediriger l'utilisateur vers la page de connexion si l'utilisateur n'est pas authentifié
                return redirect()->route('login')->with('error', 'Veuillez vous connecter pour postuler à cette offre.');
            }
        }
    }
    
    
    
    

