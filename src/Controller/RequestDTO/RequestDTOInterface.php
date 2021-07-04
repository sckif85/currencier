<?php

namespace App\Controller\RequestDTO;

use Symfony\Component\HttpFoundation\Request;

interface RequestDTOInterface
{
    public function __construct(Request $request);
}