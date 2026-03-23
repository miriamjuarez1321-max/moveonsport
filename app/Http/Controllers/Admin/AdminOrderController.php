<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        
        $orders = Order::with('user')
            ->when($status, function ($query, $status) {
                return $query->where('estado_pago', $status);
            })
            ->latest()
            ->paginate(15);

        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.prenda']);
        return view('admin.orders.show', compact('order'));
    }

    public function approve(Order $order)
    {
        try {
            if ($order->estado_pago !== 'pendiente_verificacion') {
                return back()->with('error', 'Solo se pueden aprobar pedidos en estado de verificación.');
            }

            $order->update(['estado_pago' => 'pagado']);

            return redirect()->route('admin.orders.index')->with('success', "Pedido #{$order->id} aprobado correctamente.");
        } catch (\Exception $e) {
            Log::error('Error al aprobar pedido: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado al aprobar el pedido.');
        }
    }

    public function reject(Order $order)
    {
        try {
            if ($order->estado_pago !== 'pendiente_verificacion') {
                return back()->with('error', 'Solo se pueden rechazar pedidos en estado de verificación.');
            }

            $order->update(['estado_pago' => 'rechazado']);

            return redirect()->route('admin.orders.index')->with('success', "Pedido #{$order->id} rechazado. El usuario podrá subir un nuevo comprobante.");
        } catch (\Exception $e) {
            Log::error('Error al rechazar pedido: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado al rechazar el pedido.');
        }
    }

    public function updateShipping(Request $request, Order $order)
    {
        try {
            if ($order->estado_pago !== 'pagado') {
                return back()->with('error', 'No se puede marcar como enviado un pedido que no ha sido pagado.');
            }

            $request->validate([
                'estado_envio' => 'required|in:pendiente,enviado,entregado',
            ]);

            $order->update(['estado_envio' => $request->estado_envio]);

            return back()->with('success', "Estado de envío actualizado a: {$request->estado_envio}");
        } catch (\Exception $e) {
            Log::error('Error al actualizar estado de envío: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado al actualizar el envío.');
        }
    }
}
