@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .order-summary-card {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        border: 1px solid #edf2f7;
    }
    .order-badge {
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .badge-pendiente_pago { background: #fef3c7; color: #92400e; }
    .badge-pendiente_verificacion { background: #e0f2fe; color: #075985; }
    .badge-pagado { background: #d1fae5; color: #065f46; }
    .badge-rechazado { background: #fee2e2; color: #b91c1c; }
    .badge-cancelado { background: #fee2e2; color: #991b1b; }

    .comprobante-view-card {
        background: #f7fafc;
        border-radius: 15px;
        padding: 20px;
        border: 1px dashed #cbd5e0;
    }
    .item-row {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #edf2f7;
    }
    .item-row:last-child { border-bottom: none; }
    .item-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>
@endpush

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-link text-decoration-none text-dark p-0">
                <i class="bi bi-arrow-left me-1"></i> Volver a pedidos
            </a>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="admin-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0">Pedido #{{ $order->id }}</h3>
                        <span class="order-badge badge-{{ $order->estado_pago }}">
                            {{ str_replace('_', ' ', $order->estado_pago) }}
                        </span>
                    </div>

                    <div class="mb-5">
                        <h5 class="fw-bold mb-3"><i class="bi bi-box-seam me-2"></i>Productos</h5>
                        <div class="items-list">
                            @foreach($order->items as $item)
                                <div class="item-row">
                                    <img src="{{ asset('storage/' . $item->prenda->imagen) }}" class="item-img">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">{{ $item->prenda->nombre }}</div>
                                        <div class="small text-muted">Talla: {{ $item->talla }} | Cantidad: {{ $item->cantidad }}</div>
                                    </div>
                                    <div class="fw-bold text-success">
                                        ${{ number_format($item->precio * $item->cantidad, 2) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <span class="h5 fw-bold">Total del Pedido:</span>
                            <span class="h5 fw-bold text-success">${{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>

                    @if($order->comprobante_pago)
                        <div class="comprobante-section mt-5">
                            <h5 class="fw-bold mb-3"><i class="bi bi-file-earmark-check me-2"></i>Comprobante de Pago</h5>
                            <div class="comprobante-view-card text-center">
                                @php $extension = pathinfo($order->comprobante_pago, PATHINFO_EXTENSION); @endphp
                                @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('storage/' . $order->comprobante_pago) }}" class="img-fluid rounded-4 shadow-sm mb-3" style="max-height: 500px;">
                                @else
                                    <div class="py-5">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 4rem;"></i>
                                        <p class="mt-3 fw-bold">Archivo PDF</p>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ asset('storage/' . $order->comprobante_pago) }}" target="_blank" class="btn btn-dark rounded-pill px-4">
                                        <i class="bi bi-eye me-2"></i> Ver archivo completo
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="admin-card mb-4">
                    <h5 class="fw-bold mb-4"><i class="bi bi-person me-2"></i>Información del Cliente</h5>
                    <div class="mb-3">
                        <label class="small text-muted d-block">Nombre</label>
                        <span class="fw-semibold">{{ $order->user->name }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted d-block">Correo Electrónico</label>
                        <span class="fw-semibold">{{ $order->user->email }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted d-block">Método de Pago</label>
                        <span class="badge bg-light text-dark border">{{ strtoupper($order->metodo_pago) }}</span>
                    </div>
                    <div class="mb-0">
                        <label class="small text-muted d-block">Referencia Bancaria</label>
                        <span class="fw-bold text-primary">{{ $order->referencia_bancaria ?? 'N/A' }}</span>
                    </div>
                </div>

                <div class="admin-card mb-4">
                    <h5 class="fw-bold mb-4"><i class="bi bi-truck me-2"></i>Estado de Envío</h5>
                    @if($order->estado_pago === 'pagado')
                        <form action="{{ route('admin.orders.update_shipping', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <select name="estado_envio" class="form-select rounded-3" onchange="this.form.submit()">
                                    <option value="pendiente" {{ ($order->estado_envio ?? 'pendiente') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="enviado" {{ ($order->estado_envio ?? 'pendiente') === 'enviado' ? 'selected' : '' }}>Enviado</option>
                                    <option value="entregado" {{ ($order->estado_envio ?? 'pendiente') === 'entregado' ? 'selected' : '' }}>Entregado</option>
                                </select>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning small rounded-3 mb-0">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            El pedido debe estar <strong>Pagado</strong> para gestionar el envío.
                        </div>
                    @endif
                </div>

                @if($order->estado_pago == 'pendiente_verificacion')
                    <div class="admin-card bg-light border-0">
                        <h5 class="fw-bold mb-4 text-center">Acciones de Verificación</h5>
                        <div class="d-grid gap-3">
                            <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100 py-3 rounded-4 fw-bold">
                                    <i class="bi bi-check-circle me-2"></i> Confirmar Pago
                                </button>
                            </form>
                            <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de rechazar este pago?')">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100 py-3 rounded-4 fw-bold">
                                    <i class="bi bi-x-circle me-2"></i> Rechazar Comprobante
                                </button>
                            </form>
                        </div>
                        <p class="small text-muted mt-4 mb-0 text-center">
                            Al confirmar, el pedido pasará a estado <strong>Pagado</strong>. Al rechazar, volverá a <strong>Pendiente de Pago</strong> para que el usuario suba otro archivo.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
