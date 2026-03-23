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
            <h1 class="fw-bold mb-4">Procesando Pago con {{ ucfirst($method) }}</h1>
            
            <div class="checkout-card mb-5">
                <h2>Resumen de pago</h2>
                <div class="summary-total-row">
                    <span>Total a pagar</span>
                    <span>${{ number_format($order->total, 2) }}</span>
                </div>
            </div>

            @if($method === 'stripe')
                <!-- Simulación de formulario Stripe -->
                <div class="checkout-card mb-4" id="stripe-form">
                    <h3 class="mb-4 text-start fw-bold">Pagar con tarjeta</h3>
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold">Número de tarjeta</label>
                        <div class="form-control py-3 d-flex align-items-center bg-light">
                            <i class="bi bi-credit-card me-3 text-muted"></i>
                            <input type="text" class="border-0 bg-transparent w-100 outline-none" placeholder="XXXX XXXX XXXX XXXX" maxlength="16">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <label class="form-label fw-semibold">Fecha de vencimiento</label>
                            <input type="text" class="form-control py-3 bg-light" placeholder="MM/YY">
                        </div>
                        <div class="col-6 text-start">
                            <label class="form-label fw-semibold">CVC</label>
                            <input type="text" class="form-control py-3 bg-light" placeholder="123">
                        </div>
                    </div>
                    <button class="btn-pay mt-4" onclick="confirmPayment('stripe')">Confirmar pago con Stripe</button>
                </div>
            @endif

            @if($method === 'paypal')
                <div class="p-4 bg-white rounded-4 border mb-4 text-center">
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal" class="mb-4">
                    <p class="fs-5 mb-4 text-muted">Haz clic en el botón de abajo para iniciar sesión en tu cuenta de PayPal y completar el pago.</p>
                    <button class="btn-pay" onclick="confirmPayment('paypal')">Pagar con PayPal Checkout</button>
                </div>
            @endif

            <p class="text-muted small mt-4">
                <i class="bi bi-info-circle me-1"></i>
                Estás en un entorno seguro de pruebas. No se realizarán cargos reales a tu cuenta.
            </p>
        </div>
    </div>
</section>

@push('scripts')
<script>
function confirmPayment(method) {
    // Simulación de confirmación de pago
    const btn = event.target;
    btn.disabled = true;
    btn.innerHTML = '<i class="bi bi-hourglass-split me-2 spin"></i>Procesando...';
    
    setTimeout(() => {
        // En un entorno real, aquí se confirmaría con el backend antes de redirigir
        window.location.href = "{{ route('checkout.success', $order->id) }}";
    }, 2000);
}
</script>
@endpush

@endsection
