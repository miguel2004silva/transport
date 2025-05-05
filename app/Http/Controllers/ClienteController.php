<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;

class ClienteController extends Controller
{
    public function store(StoreClienteRequest $request):Cliente {


$cliente = Cliente::create($request->all());


return $cliente;

    }
}
