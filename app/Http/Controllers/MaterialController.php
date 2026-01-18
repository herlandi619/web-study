<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index() {
        $materials = Material::with('subject')->get();
        return view('materials.index', compact('materials'));
    }

    public function show($id){
        $materials = Material::findOrFail($id);
        return view('materials.show', [
            'material' => $materials
        ]);
    }

    public function MateriIndex(){
        $materis = Material::orderBy('created_at', 'desc')->get();
        return view('guru.materi.index', compact('materis'));
    }

    public function materiCreate()
    {
        $subjects = Subject::orderBy('name')->get();

        return view('guru.materi.create', compact('subjects'));
    }

    public function materiStore(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Material::create([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil ditambahkan');
    }

    public function materiDestroy($id){
        $materi = Material::findOrFail($id);

        $materi->delete();

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil dihapus');
    }

    // materi edit
    public function materiEdit($id)
    {
        $materi = Material::findOrFail($id);
        $subjects = Subject::all();

        return view('guru.materi.edit', compact('materi', 'subjects'));
    }

    // update materi
    public function materiUpdate(Request $request, $id)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
        ]);

        $materi = Material::findOrFail($id);

        $materi->update([
            'subject_id' => $request->subject_id,
            'title'      => $request->title,
            'content'    => $request->content,
        ]);

        return redirect()
            ->route('guru.materi.index')
            ->with('success', 'Materi berhasil diperbarui');
    }



}
