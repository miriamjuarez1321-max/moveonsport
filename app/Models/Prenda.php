<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'stock',
        'talla',
        'color',
        'imagen',
        'categoria',
        'tipo',
    ];

    public function tallas()
    {
        return $this->hasMany(PrendaTalla::class);
    }

    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function getMaterialFormateadoAttribute()
    {
        $tipo = strtolower($this->tipo ?? '');
        $cat = strtolower($this->categoria ?? '');
        
        if (in_array($tipo, ['botellas', 'botella']) || $cat === 'botellas') {
            return 'PET reciclado';
        } elseif (in_array($tipo, ['mochilas', 'mochila']) || $cat === 'mochilas') {
            return 'PET reciclado de alta resistencia';
        } elseif ($this->categoria === 'accesorios') {
            return 'Material reciclado de alta durabilidad';
        } else {
            return 'Algodón reciclado + PET reciclado';
        }
    }
}
