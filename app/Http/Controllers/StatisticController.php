<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;
use App\Models\JobDatingApplication;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        // Récupérer le nombre d'utilisateurs
        $usersCount = User::count();

        // Récupérer le nombre d'annonces
        $annoncesCount = Annonce::count();

        $annoncesApplayéesCount = JobDatingApplication::count();

        // Récupérer le nombre d'entreprises
        $entreprisesCount = Entreprise::count();

        return view('admin.statistics.index', compact('usersCount', 'annoncesCount', 'entreprisesCount', 'annoncesApplayéesCount'));
    }
}
