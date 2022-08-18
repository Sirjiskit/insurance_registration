<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function response($msg = '', $success = false, $data = [], $code = 200): JsonResponse
    {
        $response = [
            'success' => $success,
            "message" => $msg,
            "data" => $data
        ];
        return response()->json($response, $code);
    }
    public function fmtErr($errors)
    {
        $message = null;
        foreach ($errors as $k => $v) :
            if (is_array($v)) :
                foreach ($v as $key => $value) {
                    $message .= $message ? '<br>' . $value : $value;
                }
            else :
                $message .=  $message ? '<br>' . $v : $v;
            endif;
        endforeach;
        return $message;
    }
    public function carMakes(): array
    {
        return [
            'Alfa Romeo', 'Aston Martin', 'Audi', 'BMW', 'Bentley Motors', 'Bollinger Motors',
            'Bugatti', 'Chevrolet', 'Ferrari', 'Fiat', 'Ford', 'GMC', 'Honda', 'Hyundai', 'Infiniti', 'Innoson',
            'Jaguar', 'Jeep', 'Kia', 'Lamborghini', 'Land Rover', 'Lexus', 'Maserati', 'Mazda', 'McLaren', 'Mercedes-AMG', 'Nissan', 'Rolls-Royce', 'Suzuki', 'Tesla', 'Toyota', 'Volkswagen', 'Volvo'
        ];
    }
    public function carBodyType():array
    {
        return ['Coupe','Hatchback','Wagon','Sedan','Convertible','SUV'];
    }
}
