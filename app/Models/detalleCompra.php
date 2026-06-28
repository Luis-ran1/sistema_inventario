<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detalleCompra extends Model
{
    use HasFactory;
    
    protected $table = 'detalle_compras';

    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'subtotal',
        'compra_id',
        'producto_id'
    ];

    // Un detalle pertenece a una compra
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    // Un detalle pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
