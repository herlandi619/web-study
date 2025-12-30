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

    public function show($id) {
        $materials = Material::findOrFail($id);
        return view('materials.show', [
            'material' => $materials
        ]);
    }
}
