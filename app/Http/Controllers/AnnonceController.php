<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceRequest;
use App\Models\Annonce;
use App\Models\Entreprise;
use App\Models\JobDatingApplication;
use App\Models\Skill;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::latest()->paginate(5);
        $skills = Skill::all();

        return view('admin.annonces.index',compact('annonces'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entreprises = Entreprise::all();
        $skills = Skill::all(); // Fetch all skills
        
        return view('admin.annonces.create', compact('entreprises', 'skills'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    {
        $annonce = Annonce::create($request->validated());
        $annonce->skills()->sync($request->input('skills', []));

    
        return redirect()->route('annonces.index')
                        ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        return view('admin.annonces.show',compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Récupérer l'annonce spécifique par son identifiant
        $annonce = Annonce::findOrFail($id); 
    
        // Récupérer toutes les entreprises
        $entreprises = Entreprise::all(); 
    
        // Récupérer toutes les compétences disponibles
        $skills = Skill::all();
    
        // Retourner la vue d'édition avec l'annonce, les entreprises et les compétences
        return view('admin.annonces.edit', compact('annonce', 'entreprises', 'skills'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {

        
        $annonce->update($request->validated());
        $annonce->skills()->sync($request->input('skills', []));
        return redirect()->route('annonces.index')
                        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
      
        $annonce->delete();
         
        return redirect()->route('annonces.index')
                        ->with('success','Company deleted successfully');
    }

    public function showDashboard()
    {
        $annonces = Annonce::all(); 
        return view('annonces.index', compact('annonces'));
    }

    public function showWelcome()
    {
        $annonces = Annonce::latest()->paginate(5); 
        return view('welcome', compact('annonces'));
    }

    
}