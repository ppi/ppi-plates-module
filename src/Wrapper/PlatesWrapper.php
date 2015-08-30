<?php

namespace PPI\PlatesTemplating;

use PPI\Framework\View\EngineInterface;
use League\Plates\Engine as PlatesEngine;
use PPI\Framework\Http\Response;

class PlatesWrapper
{

    /**
     * @var PlatesEngine
     */
    protected $platesEngine;

    /**
     *
     * @todo - make sure PlatesEngine has ->setFileExtension('.plate') as default ext
     * @todo - make this setting configurable
     * @param PlatesEngine $engine
     */
    public function __construct(PlatesEngine $engine)
    {
        $this->platesEngine = $engine;
    }

    /**
     * @param $name
     * @param array $parameters
     * @return string
     */
    public function render($name, array $parameters = array())
    {
        return $this->platesEngine->render($name, $parameters);
    }

    /**
     * @param $name
     * @return bool
     */
    public function exists($name)
    {
        return $this->platesEngine->exists($name);
    }

    /**
     * @param $name
     * @return bool
     */
    public function supports($name)
    {
        return $name === $this->platesEngine->getFileExtension();
    }

    /**
     * @param $name
     * @param array $parameters
     * @param Response|null $response
     * @return Response
     */
    public function renderResponse($name, array $parameters = array(), Response $response = null)
    {
        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($this->render($name, $parameters));

        return $response;
    }

}