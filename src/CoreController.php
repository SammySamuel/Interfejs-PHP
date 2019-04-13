<?php


namespace App;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CoreController extends AbstractController
{
    /** @var array */
    protected $data = [];

    public function renderWithData(string $view, Response $response = null): Response
    {
        $this->parseInitialData();
        return $this->render($view, $this->data, $response);
    }

    private final function parseInitialData()
    {
        $this->data['title'] = 'Kurierowo';
    }


    /**
     * @param string $parameters
     * @return array
     */
    public function parseData(string $parameters)
    {
        $postDataArray = [];
        parse_str($parameters, $postDataArray);
        return $postDataArray;
    }
}