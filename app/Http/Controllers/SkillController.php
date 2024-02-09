<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceRequest;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->paginate(5);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('admin.skills.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->inputs as $key => $value) {
            Skill::create($value);
    }
    return back()->with('success', 'Skills saved successfully');

}

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('admin.skills.index', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        $skills = Skill::all();
        return view('admin.skills.edit', compact('skill', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $validatedData = $request->validated();
        $skill->update(['name' => $validatedData['name']]);
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully');
    }


    
}
