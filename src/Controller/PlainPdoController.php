<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PlainPdoController
 * @package App\Controller
 */
class PlainPdoController extends Controller
{
    /**
     * @Route("/plain-pdo")
     */
    public function index()
    {
        $pdo = new \PDO('mysql:dbname=sakila;host=127.0.0.1','root', 'secret');

        $stmt = $pdo->query('SELECT DISTINCT actor.actor_id, actor.first_name, actor.last_name, c.name FROM actor 
          JOIN film_actor fa on actor.actor_id = fa.actor_id 
          JOIN film f on fa.film_id = f.film_id 
          JOIN film_category f2 on f.film_id = f2.film_id 
          JOIN category c on f2.category_id = c.category_id
          WHERE f2.category_id=15 ORDER BY fa.actor_id');

        $result = $stmt->fetchAll($pdo::FETCH_ASSOC);

        return $this->render('page/plain-pdo', ['name' => $result[0]['name'], 'count' => count($result)]);
    }
}