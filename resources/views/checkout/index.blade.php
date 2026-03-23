@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/checkout/checkout.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')

@include('partials.back-button')

<section class="checkout-section">
    <div class="container">
        <h1 class="mb-4 fw-bold">Finalizar Compra</h1>

        @if(session('error'))
            <div class="alert alert-danger rounded-4 p-3 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="checkout-container">
            <!-- Selección de Método de Pago -->
            <div class="checkout-card">
                <h2>Elige tu método de pago</h2>
                
                <form id="paymentForm" action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="payment-methods">
                        <!-- Stripe -->
                        <label class="payment-option active" for="stripe">
                            <input type="radio" name="metodo_pago" id="stripe" value="stripe" checked onchange="updateSelection(this)">
                            <div class="payment-icon">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <div class="payment-info">
                                <h3>Tarjeta de Crédito / Débito (Stripe)</h3>
                                <p>Pago seguro y procesado al instante.</p>
                            </div>
                        </label>

                        <!-- PayPal -->
                        <label class="payment-option" for="paypal">
                            <input type="radio" name="metodo_pago" id="paypal" value="paypal" onchange="updateSelection(this)">
                            <div class="payment-icon">
                                <i class="bi bi-paypal"></i>
                            </div>
                            <div class="payment-info">
                                <h3>PayPal Checkout</h3>
                                <p>Usa tu cuenta de PayPal para pagar de forma rápida.</p>
                            </div>
                        </label>

                        <!-- Transferencia -->
                        <label class="payment-option" for="transferencia">
                            <input type="radio" name="metodo_pago" id="transferencia" value="transferencia" onchange="updateSelection(this)">
                            <div class="payment-icon">
                                <i class="bi bi-bank"></i>
                            </div>
                            <div class="payment-info">
                                <h3>Transferencia Bancaria</h3>
                                <p>Genera una referencia y paga en ventanilla o banca móvil.</p>
                            </div>
                        </label>
                    </div>

                    <button type="submit" class="btn-pay mt-4">Continuar con el pago</button>
                </form>
            </div>

            <!-- Resumen de Pedido -->
            <div class="checkout-card">
                <h2>Resumen del pedido</h2>
                
                <div class="summary-items">
                    @foreach($cartItems as $item)
                        <div class="summary-item">
                            <img src="{{ asset('storage/' . $item->prenda->imagen) }}" alt="{{ $item->prenda->nombre }}">
                            <div class="summary-item-info">
                                <h4>{{ $item->prenda->nombre }}</h4>
                                <p>Cantidad: {{ $item->cantidad }}</p>
                                <p>Precio unitario: ${{ number_format($item->prenda->precio_venta, 2) }}</p>
                            </div>
                            <div class="ms-auto fw-bold">
                                ${{ number_format($item->prenda->precio_venta * $item->cantidad, 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="summary-total-row">
                    <span>Total a pagar</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>

                <div class="mt-4 p-3 bg-light rounded-4 text-center">
                    <p class="small text-muted mb-2">
                        <i class="bi bi-shield-lock-fill text-success me-1"></i>
                        Tu pago es 100% seguro. Utilizamos encriptación SSL de nivel bancario.
                    </p>
                    <p class="small mb-0">
                        Consulta nuestras <a href="{{ route('legal.devoluciones') }}" target="_blank" style="color: #0b3d2e; font-weight: 600; text-decoration: underline;">Políticas de Cambios y Devoluciones</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function updateSelection(radio) {
    // Remover clase active de todas las opciones
    document.querySelectorAll('.payment-option').forEach(option => {
        option.classList.remove('active');
    });
    // Agregar clase active a la seleccionada
    radio.closest('.payment-option').classList.add('active');
}
</script>
@endpush

@endsection
