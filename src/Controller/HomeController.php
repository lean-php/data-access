<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return new Response("<h2>Home</h2>");
    }
}