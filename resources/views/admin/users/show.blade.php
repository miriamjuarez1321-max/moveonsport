@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-link text-decoration-none text-dark p-0">
                <i class="bi bi-arrow-left me-1"></i> Volver a la lista
            </a>
        </div>

        <h2 class="mb-4">Detalles del Usuario</h2>

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

        <div class="admin-card">
            <div class="admin-profile-header">
                <div class="admin-profile-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="admin-profile-info">
                    <h3>{{ $user->name }}</h3>
                    <p class="mb-0">Usuario desde {{ $user->created_at->format('F Y') }}</p>
                </div>
            </div>

            <div class="admin-detail-grid mb-5">
                <div class="admin-detail-item">
                    <label>Nombre Completo</label>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="admin-detail-item">
                    <label>Correo Electrónico</label>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="admin-detail-item">
                    <label>Rol de Sistema</label>
                    <span class="badge-role {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                        {{ $user->role }}
                    </span>
                </div>
                <div class="admin-detail-item">
                    <label>Estado de Cuenta</label>
                    <span class="badge-status {{ ($user->role === 'admin' || $user->status === 'activo') ? 'badge-active' : 'badge-inactive' }}">
                        {{ $user->role === 'admin' ? 'activo' : ($user->status ?? 'activo') }}
                    </span>
                </div>
                <div class="admin-detail-item">
                    <label>Fecha de Registro</label>
                    <span>{{ $user->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="admin-detail-item">
                    <label>Última Actualización</label>
                    <span>{{ $user->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="d-flex gap-3 pt-4 border-top">
                <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" 
                        class="btn {{ $user->status === 'activo' ? 'btn-outline-danger' : 'btn-outline-success' }} rounded-3 px-4 {{ $user->role === 'admin' ? 'opacity-50 pointer-events-none' : '' }}"
                        {{ $user->role === 'admin' ? 'disabled' : '' }}>
                        <i class="bi bi-power me-2"></i>
                        {{ $user->status === 'activo' ? 'Desactivar Cuenta' : 'Activar Cuenta' }}
                    </button>
                    @if($user->role === 'admin')
                        <small class="text-muted d-block mt-1">Los administradores no pueden ser desactivados.</small>
                    @endif
                </form>

                @if($user->role !== 'admin' && $user->id !== auth()->id())
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar permanentemente a este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-3 px-4">
                            <i class="bi bi-trash me-2"></i> Eliminar Usuario
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
