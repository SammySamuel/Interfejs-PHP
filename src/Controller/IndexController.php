<?php


namespace App\Controller;

use App\CoreController;
use App\Service\UserService;
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
    public function indexAction(UserService $userService): Response
    {
        $this->data['SMOCZEK'] = [
            12 => 'Krzyś',
            13 => 'Samuel'
        ];
        $this->data['user'] = $userService->getNameByUserId(1);
        return $this->renderWithData('@App/Main/index.html.twig');
    }
}