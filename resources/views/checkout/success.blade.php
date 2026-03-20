@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/checkout/checkout.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')

@include('partials.back-button')

<section class="checkout-section">
    <div class="container text-center py-5">
        <div class="success-container">
            <div class="success-icon animate__animated animate__bounceIn">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h1 class="fw-bold mb-3">¡Pedido Recibido!</h1>
            <p class="text-muted fs-5 mb-5">Gracias por tu compra, tu pedido ha sido registrado con éxito.</p>

            @if($order->metodo_pago === 'transferencia')
                <div class="bank-info-card">
                    <h3 class="fw-bold mb-4"><i class="bi bi-info-circle me-2"></i>Instrucciones de Pago</h3>
                    <p class="mb-4">Realiza tu transferencia bancaria con los siguientes datos:</p>
                    
                    <div class="bank-info-item">
                        <strong>Banco:</strong>
                        <span>BBVA México</span>
                    </div>
                    <div class="bank-info-item">
                        <strong>Cuenta:</strong>
                        <span>1234567890</span>
                    </div>
                    <div class="bank-info-item">
                        <strong>CLABE:</strong>
                        <span>123456789012345678</span>
                    </div>
                    <div class="bank-info-item">
                        <strong>Referencia Única:</strong>
                        <span>{{ $order->referencia_bancaria }}</span>
                    </div>
                    <div class="bank-info-item">
                        <strong>Total a Pagar:</strong>
                        <span>${{ number_format($order->total, 2) }}</span>
                    </div>
                    
                    <div class="mt-4 p-3 bg-white rounded-3 border">
                        <p class="small text-muted mb-0">
                            <strong>Nota:</strong> Una vez realizada la transferencia, por favor sube tu comprobante de pago en tu historial de compras para que podamos validar tu pedido.
                        </p>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('orders.index') }}" class="btn-pay py-2 px-4 d-inline-block text-decoration-none">Ir al historial de compras</a>
                    </div>
                </div>
            @else
                <div class="alert alert-success rounded-4 p-4 mb-5">
                    <p class="mb-0 fs-5">Tu pago con <strong>{{ ucfirst($order->metodo_pago) }}</strong> ha sido confirmado correctamente.</p>
                </div>
            @endif

            <div class="d-flex flex-column gap-3 max-width-300 mx-auto">
                <a href="{{ route('home') }}" class="btn-pay py-3">Volver al inicio</a>
                <a href="{{ route('collections') }}" class="text-decoration-none text-muted fw-bold">Seguir comprando</a>
            </div>
        </div>
    </div>
</section>

@endsection
