<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaChartController extends Controller
{
    public function getAngles(Request $request)
    {
        // Recebe os dados via POST em formato JSON
        $data = $request->json()->all();

        // Calcula o valor total das entradas
        $total = array_sum($data);

        // Calcula o ângulo correspondente a cada entrada
        $angles = array();
        foreach ($data as $label => $value) {
            $angle = $value / $total * 360;
            $angles[$label] = round($angle, 2);
        }

        // Retorna os ângulos calculados em formato JSON
        return response()->json($angles);
    } //
}
