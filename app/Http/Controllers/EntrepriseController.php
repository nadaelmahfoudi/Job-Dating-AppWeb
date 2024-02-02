<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntrepriseRequest;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprises = Entreprise::latest()->paginate(5);
        
        return view('admin.entreprises.index',compact('entreprises'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
  
        return view('admin.entreprises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntrepriseRequest $request)
    {

        
        Entreprise::create($request->validated());
         
        return redirect()->route('dashboard')
                        ->with('success','Company created successfully.');
;
    }

    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        return view('admin.entreprises.show',compact('entreprise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        return view('admin.entreprises.edit', compact('entreprise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntrepriseRequest $request, Entreprise $entreprise)
    {
       
        $entreprise->update($request->validated());
        
        return redirect()->route('dashboard')
                        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
      
        $entreprise->delete();
         
        return redirect()->route('dashboard')
                        ->with('success','Company deleted successfully');
    }

    public function showDashboard()
    {
        $entreprises = Entreprise::all(); 
        return view('dashboard', compact('entreprises'));
    }

}