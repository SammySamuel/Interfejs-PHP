<?php


namespace App\Controller;

use App\CoreController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TestController
 * @package App\Controller
 */
class IndexController extends CoreController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function ekpListAction(): Response
    {
        return $this->renderWithData('@App/Main/index.html.twig');
    }
}