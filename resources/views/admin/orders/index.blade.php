@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .nav-tabs-admin {
        border-bottom: 2px solid #edf2f7;
        margin-bottom: 25px;
        gap: 20px;
    }
    .nav-tabs-admin .nav-link {
        border: none;
        color: #718096;
        font-weight: 600;
        padding: 10px 5px;
        position: relative;
        transition: all 0.2s;
    }
    .nav-tabs-admin .nav-link.active {
        color: #2d3748;
        background: transparent;
    }
    .nav-tabs-admin .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #0b3d2e;
    }
    .badge-status-admin {
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .badge-pendiente_pago { background: #fef3c7; color: #92400e; }
    .badge-pendiente_verificacion { background: #e0f2fe; color: #075985; }
    .badge-pagado { background: #d1fae5; color: #065f46; }
    .badge-rechazado { background: #fee2e2; color: #b91c1c; }
    .badge-cancelado { background: #fee2e2; color: #991b1b; }
    
    .comprobante-preview {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        cursor: pointer;
    }
    .comprobante-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f7fafc;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        color: #718096;
        font-size: 1.2rem;
    }
</style>
@endpush

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="admin-title mb-0">
                    <i class="bi bi-wallet2"></i> Validación de Pagos
                </h1>
            </div>

            <ul class="nav nav-tabs-admin">
                <li class="nav-item">
                    <a class="nav-link {{ is_null($status) ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                        Todos los Pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status == 'pendiente_verificacion' ? 'active' : '' }}" href="{{ route('admin.orders.index', ['status' => 'pendiente_verificacion']) }}">
                        Pendientes de Verificación
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status == 'pendiente_pago' ? 'active' : '' }}" href="{{ route('admin.orders.index', ['status' => 'pendiente_pago']) }}">
                        Esperando Pago
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status == 'pagado' ? 'active' : '' }}" href="{{ route('admin.orders.index', ['status' => 'pagado']) }}">
                        Pagados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status == 'rechazado' ? 'active' : '' }}" href="{{ route('admin.orders.index', ['status' => 'rechazado']) }}">
                        Rechazados
                    </a>
                </li>
            </ul>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="admin-table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Pedido #</th>
                            <th>Cliente</th>
                            <th>Método</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td class="fw-bold">#{{ $order->id }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $order->user->name }}</div>
                                    <div class="small text-muted">{{ $order->user->email }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border text-uppercase" style="font-size: 0.7rem;">
                                        {{ $order->metodo_pago }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-status-admin badge-{{ $order->estado_pago }}">
                                        {{ str_replace('_', ' ', $order->estado_pago) }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">${{ number_format($order->total, 2) }}</td>
                                <td class="text-muted small">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if($order->comprobante_pago)
                                        <div class="d-flex align-items-center gap-2">
                                            @php $extension = pathinfo($order->comprobante_pago, PATHINFO_EXTENSION); @endphp
                                            @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                                <img src="{{ asset('storage/' . $order->comprobante_pago) }}" class="comprobante-preview" data-bs-toggle="modal" data-bs-target="#imgModal{{ $order->id }}">
                                            @else
                                                <a href="{{ asset('storage/' . $order->comprobante_pago) }}" target="_blank" class="comprobante-icon" title="Ver PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                                                </a>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-outline-dark border-0 p-1" data-bs-toggle="modal" data-bs-target="#imgModal{{ $order->id }}" title="Ver comprobante">
                                                <i class="bi bi-zoom-in"></i>
                                            </button>
                                        </div>
                                    @else
                                        <span class="text-muted small">Sin archivo</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="admin-actions">
                                        @if($order->estado_pago == 'pendiente_verificacion')
                                            <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn-admin-action" style="background: #d1fae5; color: #065f46; border: 1px solid #d1fae5;" title="Confirmar Pago">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Rechazar este pago? El pedido volverá a estado pendiente de pago.')">
                                                @csrf
                                                <button type="submit" class="btn-admin-action" style="background: #fee2e2; color: #991b1b; border: 1px solid #fee2e2;" title="Rechazar Pago">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-admin-action btn-view" title="Ver Detalles">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>

                                    @if($order->comprobante_pago)
                                        <!-- Modal para ver comprobante -->
                                        <div class="modal fade" id="imgModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content shadow-lg border-0 rounded-4">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title fw-bold">Comprobante de Pago - Pedido #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4 text-center">
                                                        @php $extension = pathinfo($order->comprobante_pago, PATHINFO_EXTENSION); @endphp
                                                        @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                                            <img src="{{ asset('storage/' . $order->comprobante_pago) }}" class="img-fluid rounded-3 shadow-sm mb-3" style="max-height: 70vh;">
                                                        @else
                                                            <div class="py-5 bg-light rounded-3 mb-3">
                                                                <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 5rem;"></i>
                                                                <p class="mt-3 fw-bold">Comprobante en formato PDF</p>
                                                                <a href="{{ asset('storage/' . $order->comprobante_pago) }}" target="_blank" class="btn btn-primary rounded-pill px-4">
                                                                    <i class="bi bi-box-arrow-up-right me-2"></i> Abrir PDF en nueva pestaña
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cerrar</button>
                                                        @if($order->estado_pago == 'pendiente_verificacion')
                                                            <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success rounded-pill px-4">Aprobar Pago</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    No hay pedidos en este estado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $orders->appends(['status' => $status])->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
