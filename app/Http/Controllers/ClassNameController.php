<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{
    public function classesIndex()
    {
        $classes = ClassName::latest()->paginate(10);

        return view('admin.classes.index', compact('classes'));
    }

    public function classesCreate(){
        return view('admin.classes.create');
    }

    public function classesStore(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
        ]);

        ClassName::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function classesDestroy($class)
    {
        ClassName::findOrFail($class)->delete();

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Kelas berhasil dihapus');
    }

    public function classesEdit($class){
        $class = ClassName::findOrFail($class);
        return view('admin.classes.edit',[
            'class' => $class
        ]);
    }

    public function classesUpdate(Request $request, $class)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
        ]);

        $class = ClassName::findOrFail($class);
        $class->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Kelas berhasil diperbarui');
    }

}
