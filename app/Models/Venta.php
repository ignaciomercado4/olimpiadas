<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'comprador', 'numero_pedido', 'direccion'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'numero_pedido');
    }
}
    