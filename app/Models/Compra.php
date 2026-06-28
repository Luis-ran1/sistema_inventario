<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compra extends Model
{
     use HasFactory;
    
    protected $table = 'compras';

    protected $fillable = [
        'fecha_compra',
        'total',
        'proveedor_id'
    ];

    // Una compra pertenece a un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    //Un producto puede estar en muchos detalles de compra 
    public function detalleCompras()
    {
        return $this->hasMany(detalleCompra::class);
    }
}
