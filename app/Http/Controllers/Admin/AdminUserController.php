<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function toggleStatus(User $user)
    {
        try {
            // Bloquear completamente cualquier cambio de estado para administradores
            if ($user->role === 'admin') {
                return back()->with('error', 'No se puede cambiar el estado de un usuario administrador.');
            }

            $user->status = ($user->status === 'activo' || $user->status === null) ? 'inactivo' : 'activo';
            $user->save();

            return back()->with('success', 'Estado del usuario actualizado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error actualizando estado del usuario: ' . $e->getMessage());
            return back()->with('error', 'Error inesperado al cambiar el estado del usuario.');
        }
    }

    public function destroy(User $user)
    {
        try {
            // Bloquear eliminación de administradores
            if ($user->role === 'admin') {
                return back()->with('error', 'No se puede eliminar a un usuario administrador por seguridad.');
            }

            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error eliminando usuario: ' . $e->getMessage());
            return back()->with('error', 'Error inesperado al eliminar el usuario.');
        }
    }
}
