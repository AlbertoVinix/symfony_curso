<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Exception;

class ClienteHttp {
    private $clienteHttp;

    public function __construct() {
        $this->clienteHttp = HttpClient::create();
    }

    public function obtenerCodigoUrl(string $url) {
        $codigoEstado = null;
        try {
            $respuesta = $this->clienteHttp->request('GET', $url);
            $codigoEstado = $respuesta->getStatusCode();

            return $codigoEstado;
        } catch(Exception $e) {
            $codigoEstado = null;
        }
    }
}
