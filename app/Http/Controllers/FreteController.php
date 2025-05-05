<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Models\Frete;
use App\Enums\FreteStatus;
use Illuminate\Http\Request;
use APP\Http\Controllers\Controller;
use App\Http\Requests\StoreFreteRequest;

class FreteController extends Controller
{
    

public function store(StoreFreteRequest $request): Frete{

$dados = $request->all();
$dados['codigo_rastreio'] = Helpers::geraCodigoRastreioUnico();
$dados['status'] = FreteStatus::EM_TRANSITO;

$frete = Frete::create($dados);

return $frete;

}


}
