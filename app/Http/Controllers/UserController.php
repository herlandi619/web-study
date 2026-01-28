<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminIndex(Request $request)
    {
        $users = User::when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function adminCreate(){
        return view('admin.users.create');
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|in:admin,guru,siswa',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function adminDestroy(User $user)
    {
        // 🔒 Proteksi: admin tidak boleh menghapus dirinya sendiri
        if (auth()->id() === $user->id) {
            return redirect()
                ->back()
                ->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        // 🗑️ Hapus user
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

    public function adminEdit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // VALIDASI
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role'     => 'required|in:admin,guru,siswa',
        ]);

        // UPDATE DATA
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;

        // PASSWORD OPSIONAL
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui');
    }
    
    
}


