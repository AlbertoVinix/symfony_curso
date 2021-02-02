<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

use App\Service\ClienteHttp;

class UrlAccessValidator extends ConstraintValidator
{
    private $clienteHttp;

    public function __construct(ClienteHttp $clienteHttp) {
        $this->clienteHttp = $clienteHttp;
    }

    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        $codigoEstado = $this->clienteHttp->obtenerCodigoUrl($value);

        if( $codigoEstado == null ) {
            $codigoEstado = 'Error';
        }

        if( $codigoEstado != 200 ) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $codigoEstado)
                ->addViolation();
        }
    }

    public function __toString() {
        return $this->clienteHttp;
    }
}
