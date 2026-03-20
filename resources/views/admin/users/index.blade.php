@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="admin-title mb-0">
                    <i class="bi bi-people-fill"></i> Gestión de Usuarios
                </h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="admin-table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="fw-bold">#{{ $user->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-sm bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 12px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="fw-semibold">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge-role {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-status {{ ($user->role === 'admin' || $user->status === 'activo') ? 'badge-active' : 'badge-inactive' }}">
                                        {{ $user->role === 'admin' ? 'activo' : ($user->status ?? 'activo') }}
                                    </span>
                                </td>
                                <td class="text-muted small">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="admin-actions">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn-admin-action btn-view" title="Ver Perfil">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        
                                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                class="btn-admin-action btn-toggle {{ $user->role === 'admin' ? 'opacity-50 pointer-events-none' : '' }}" 
                                                title="{{ $user->role === 'admin' ? 'No se puede desactivar a un administrador' : ($user->status === 'activo' ? 'Desactivar' : 'Activar') }}"
                                                {{ $user->role === 'admin' ? 'disabled' : '' }}>
                                                <i class="bi bi-power"></i>
                                            </button>
                                        </form>

                                        @if($user->role !== 'admin' && $user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar a este usuario?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-admin-action btn-delete" title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
