<?php


namespace App\Controller;

use App\CoreController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends CoreController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function indexAction(): Response
    {
        return $this->renderWithData('@App/Main/index.html.twig');
    }
}