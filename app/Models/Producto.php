<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id'
    ];
    //Un producto pertenece a una categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Un producto puede estar en muchos detalles de compra 
    public function detalleCompras()
    {
        return $this->hasMany(detalleCompra::class);
    }
}
