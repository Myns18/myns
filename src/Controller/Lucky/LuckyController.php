<?php
// src/Controller/Lucky/LuckyController.php
namespace App\Controller\Lucky;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number(int $max): Response
    {
        $number = random_int(0, $max);
        $url = $this->generateUrl('app_lucky_number', ['max' => $max]);
        print_r($url);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}