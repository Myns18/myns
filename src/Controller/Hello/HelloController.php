<?php
namespace App\Controller\Hello;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class HelloController extends AbstractController
{
  /**
   * @Route("/Hello/helloRandom")
   */
  public function randomNameAction(): Response
  {
    return new Response(
      "<html><body><h1>Hello " .
        self::generateRandomName() .
        "</h1></body></html>"
    );
  }
  
  static function generateRandomName(): string
  {
    $nouns = [
      "Circle","Cone","Cylinder","Ellipse","Hexagon",
      "Irregular Shape","Octagon","Oval","Parallelogram",
      "Pentagon","Pyramid","Rectangle","Semicircle","Sphere",
      "Square","Star","Trapezoid","Triangle","Wedge","Whorl",
    ];
    $adjectives = [
      "Amusing", "Athletic", "Beautiful", "Brave", "Careless", 
      "Clever", "Crafty", "Creative", "Cute", "Dependable", 
      "Energetic", "Famous", "Friendly", "Graceful", "Helpful", 
      "Humble", "Inconsiderate", "Likable", "Mid  Class", "Outgoing", 
      "Poor", "Practical", "Rich", "Sad", "Skinny", "Successful", "Thin", 
      "Ugly", "Wealth",
    ];
    return $adjectives[array_rand($adjectives)] .
      " " .
      $nouns[array_rand($nouns)];
  }

    /**
   * @Route("/Hello/hello/{name}", defaults={"name" = ""})
   */
  public function nameAction($name): Response
  {
    if ($name == "") {
      $name = self::generateRandomName();
    }

    return new Response("<html><body><h1>Hello $name</h1></body></html>");
  }
}