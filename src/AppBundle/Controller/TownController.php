<?php


namespace AppBundle\Controller;


use AppBundle\Repository\TownRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;



class TownController extends Controller
{

    /**
     * @Route("/town/{town}", name="town")
     */
    public function autocompleteAction(Request $request, $town)
    {
      if ($request->isXmlHttpRequest()) {
          /**
           * @var $repository TownRepository
           */
          $repository = $this->getDoctrine()->getRepository('AppBundle:Town');
          $data = $repository->getTownLike('fr', $town);
          return new JsonResponse (array("data" => json_encode($data)));
      } else {
          throw new HttpException('500', 'invalid call');
      }
            }
}