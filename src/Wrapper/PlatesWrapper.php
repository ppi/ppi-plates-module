<?php

namespace PPI\PlatesModule\Wrapper;

use PPI\Framework\View\EngineInterface;
use League\Plates\Engine as PlatesEngine;
use Symfony\Component\HttpFoundation\Response;

class PlatesWrapper implements EngineInterface
{

    /**
     * @var PlatesEngine
     */
    protected $platesEngine;

    protected $locator;

    protected $parser;

    protected $loader;

    /**
     *
     * @todo - make sure PlatesEngine has ->setFileExtension('.plate') as default ext
     * @todo - make this setting configurable
     * @param PlatesEngine $engine
     */
    public function __construct(PlatesEngine $engine, $locator, $parser, $loader)
    {
        $this->platesEngine = $engine;
        $this->parser = $parser;
        $this->loader = $loader;
        $this->locator = $locator;
    }

    /**
     * @param $name
     * @param array $parameters
     * @return string
     */
    public function render($name, array $parameters = array())
    {
        $template = $this->parser->parse($name);
        $templatePath = $this->locator->locate($template);
        $templateDirPath = dirname($templatePath);
        $this->platesEngine->setDirectory($templateDirPath);
        $templateFile = ltrim(str_replace($templateDirPath, '', $templatePath), '/');
        $fileExt = $this->platesEngine->getFileExtension();
        $templateFile = substr($templateFile, 0, (
            strlen($templateFile) -
            // We want to go from start of string to just before the extension, including the '.' which is why the have +1
            (strlen($fileExt) + 1)
        ));
        $result = $this->platesEngine->render($templateFile, $parameters);
        return $result;
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
        $template = $this->parser->parse($name);
        return $this->platesEngine->getFileExtension() === $template->get('engine');

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