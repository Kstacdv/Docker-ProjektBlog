<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController
{
    #[Route('/index', name: 'index')]
    public function index() : Response
    {
        return new Response('To bedzie strona glowna!');
    }
}

