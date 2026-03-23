<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianteProducto extends Model
{
    protected $table = 'variantes_producto';

    protected $fillable = [
        'prenda_id',
        'tipo',
        'valor',
        'stock',
    ];

    public function prenda()
    {
        return $this->belongsTo(Prenda::class);
    }
}
