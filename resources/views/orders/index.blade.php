@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<style>
    .history-container {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        margin-top: 20px;
        border: 1px solid #f0f0f0;
    }
    .history-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 30px;
    }
    .history-title h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 5px;
    }
    .history-title p {
        color: #718096;
        font-size: 0.95rem;
    }
    .btn-back-store {
        color: #0b3d2e;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: opacity 0.2s;
    }
    .btn-back-store:hover {
        opacity: 0.7;
    }

    .alert-pending {
        background-color: #fffbeb;
        border: 1px solid #fef3c7;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 15px;
        animation: slideInDown 0.5s ease-out;
    }
    .alert-pending-icon {
        width: 45px;
        height: 45px;
        background: #fef3c7;
        color: #92400e;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .alert-pending-content h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #92400e;
        margin-bottom: 2px;
    }
    .alert-pending-content p {
        font-size: 0.9rem;
        color: #b45309;
        margin-bottom: 0;
    }

    @keyframes slideInDown {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .history-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
    }
    .history-table th {
        color: #4a5568;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        padding: 10px 20px;
        border-bottom: 1px solid #edf2f7;
    }
    .history-table td {
        padding: 20px;
        vertical-align: middle;
        background: #fff;
        font-size: 0.95rem;
    }
    .order-num {
        font-weight: 500;
        color: #2d3748;
    }
    .order-date {
        color: #718096;
    }
    .method-badge {
        background: #edf2f7;
        color: #4a5568;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .total-amount {
        color: #2b6b4f;
        font-weight: 700;
    }
    .status-badge {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    .status-pendiente { background: #fef3c7; color: #92400e; }
    .status-pendiente_pago { background: #fef3c7; color: #92400e; }
    .status-rechazado { background: #fee2e2; color: #b91c1c; }
    .status-pendiente_verificacion { background: #e0f2fe; color: #075985; }
    .status-pagado { background: #d1fae5; color: #065f46; }
    .status-cancelado { background: #fee2e2; color: #991b1b; }

    .btn-upload {
        background: #3b82f6;
        color: #fff;
        border: 1px solid #3b82f6;
    }
    .btn-upload:hover {
        background: #2563eb;
        color: #fff;
    }

    /* Estilos para el modal simple */
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
        border-radius: 15px;
        border: none;
    }

    .actions-cell {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }
    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-detail {
        background: #fff;
        color: #2d3748;
        border: 1px solid #e2e8f0;
    }
    .btn-detail:hover {
        background: #f7fafc;
    }
    .btn-pdf {
        background: #0b3d2e;
        color: #fff;
        border: 1px solid #0b3d2e;
    }
    .btn-pdf:hover {
        background: #1a4d3c;
    }

    .review-reminder {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 15px;
        margin-top: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }
    .review-reminder-text {
        font-size: 0.85rem;
        color: #4a5568;
        line-height: 1.4;
    }
    .review-reminder-text strong {
        color: #1a202c;
        display: block;
        margin-bottom: 2px;
    }
    .btn-review {
        background: #00AEEF;
        color: #fff;
        border: none;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
        transition: all 0.2s;
    }
    .btn-review:hover {
        background: #008ecb;
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .history-table thead { display: none; }
        .history-table td { display: block; text-align: right; padding: 10px 20px; }
        .history-table td::before {
            content: attr(data-label);
            float: left;
            font-weight: 700;
            text-transform: uppercase;
        }
        .actions-cell { justify-content: flex-end; margin-top: 10px; }
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="history-container">
        <div class="history-header">
            <div class="history-title">
                <h1>Historial de Compras</h1>
                <p>Consulta tus pedidos anteriores y descarga tus comprobantes.</p>
            </div>
            <a href="{{ route('collections') }}" class="btn-back-store">
                <i class="bi bi-arrow-left"></i> Volver a la tienda
            </a>
        </div>

        @if($hasPendingTransfer)
            <div class="alert-pending">
                <div class="alert-pending-icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="alert-pending-content">
                    <h4>Pedido pendiente de pago</h4>
                    <p>Tienes un pedido pendiente de pago por transferencia. Por favor sube tu comprobante para validar tu compra.</p>
                </div>
            </div>
        @elseif($hasRejectedTransfer)
            <div class="alert-pending" style="background-color: #fef2f2; border-color: #fee2e2;">
                <div class="alert-pending-icon" style="background: #fee2e2; color: #b91c1c;">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="alert-pending-content">
                    <h4 style="color: #991b1b;">Comprobante rechazado</h4>
                    <p style="color: #b91c1c;">Uno de tus comprobantes fue rechazado. Por favor, revisa tu historial y sube uno válido.</p>
                </div>
            </div>
        @endif

        @if($orders->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-bag-x" style="font-size: 3rem; color: #cbd5e0;"></i>
                <h3 class="mt-3">No tienes pedidos aún</h3>
                <p class="text-muted">Tus futuras compras aparecerán aquí.</p>
                <a href="{{ route('collections') }}" class="btn btn-primary mt-3 px-4">Comenzar a comprar</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Pedido #</th>
                            <th>Fecha</th>
                            <th>Método</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td data-label="Pedido #">
                                    <span class="order-num">#{{ $order->id }}</span>
                                </td>
                                <td data-label="Fecha">
                                    <span class="order-date">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                </td>
                                <td data-label="Método">
                                    <span class="method-badge">{{ $order->metodo_pago ?? 'REFERENCE' }}</span>
                                </td>
                                <td data-label="Total">
                                    <span class="total-amount">${{ number_format($order->total, 2) }}</span>
                                </td>
                                <td data-label="Estado">
                                    <span class="status-badge status-{{ $order->estado_pago }}">
                                        @if($order->estado_pago == 'pendiente_pago')
                                            Pendiente de Pago
                                        @elseif($order->estado_pago == 'pendiente_verificacion')
                                            En Verificación
                                        @elseif($order->estado_pago == 'rechazado')
                                            Pago Rechazado
                                        @elseif($order->estado_pago == 'pagado')
                                            Pagado
                                        @elseif($order->estado_pago == 'cancelado')
                                            Cancelado
                                        @else
                                            {{ ucfirst($order->estado_pago) }}
                                        @endif
                                    </span>
                                    @if($order->estado_pago == 'rechazado')
                                        <div class="small text-danger mt-1 fw-bold" style="font-size: 0.75rem;">
                                            Tu comprobante fue rechazado. Por favor, vuelve a subir uno válido.
                                        </div>
                                    @endif

                                    @if(in_array($order->estado_pago, ['pagado', 'enviado']))
                                        @foreach($order->items as $item)
                                            @if(!in_array($item->prenda_id, $commentedProductIds))
                                                <div class="review-reminder">
                                                    <div class="review-reminder-text">
                                                        <strong>¿Qué te pareció tu {{ $item->prenda->nombre }}?</strong>
                                                        Déjanos tu opinión para ayudarnos a mejorar la calidad de nuestros productos.
                                                    </div>
                                                    <a href="{{ route('products.show', $item->prenda->id) }}#opiniones" class="btn-review">
                                                        Escribir reseña
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="actions-cell">
                                        @if($order->metodo_pago == 'transferencia' && ($order->estado_pago == 'pendiente_pago' || $order->estado_pago == 'rechazado'))
                                            <button type="button" class="btn-action btn-upload" data-bs-toggle="modal" data-bs-target="#uploadModal{{ $order->id }}">
                                                <i class="bi bi-cloud-arrow-up"></i> {{ $order->estado_pago == 'rechazado' ? 'Reintentar Subida' : 'Subir Comprobante' }}
                                            </button>
                                        @endif
                                        <a href="#" class="btn-action btn-detail">
                                            <i class="bi bi-file-earmark-text"></i> Detalle
                                        </a>
                                        <a href="#" class="btn-action btn-pdf">
                                            <i class="bi bi-download"></i> PDF
                                        </a>
                                    </div>

                                    @if($order->metodo_pago == 'transferencia' && ($order->estado_pago == 'pendiente_pago' || $order->estado_pago == 'rechazado'))
                                        <!-- Modal de Subida -->
                                        <div class="modal fade" id="uploadModal{{ $order->id }}" tabindex="-1" aria-labelledby="uploadModalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content text-start">
                                                    <form action="{{ route('orders.upload_comprobante', $order->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header border-0 pb-0">
                                                            <h5 class="modal-title fw-bold" id="uploadModalLabel{{ $order->id }}">
                                                                {{ $order->estado_pago == 'rechazado' ? 'Reintentar Pago' : 'Subir Comprobante de Pago' }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body py-4">
                                                            <p class="text-muted small mb-4">
                                                                @if($order->estado_pago == 'rechazado')
                                                                    <span class="text-danger fw-bold d-block mb-2"><i class="bi bi-exclamation-triangle me-1"></i> Tu pago anterior fue rechazado.</span>
                                                                @endif
                                                                Adjunta el comprobante de tu transferencia para el pedido <strong>#{{ $order->id }}</strong>. Aceptamos imágenes (JPG, PNG) o PDF.
                                                            </p>
                                                            
                                                            <div class="mb-3">
                                                                <label for="comprobante{{ $order->id }}" class="form-label fw-bold">Seleccionar archivo</label>
                                                                <input type="file" class="form-control" id="comprobante{{ $order->id }}" name="comprobante" accept="image/*,.pdf" required>
                                                                <div class="form-text mt-2">Tamaño máximo: 2MB</div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0 pt-0">
                                                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary rounded-pill px-4">Enviar comprobante</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
