<?php
/**
 * This file is part of the PPI Framework.
 *
 * @copyright   Copyright (c) 2011-2013 Paul Dragoonis <paul@ppi.io>
 * @license     http://opensource.org/licenses/mit-license.php MIT
 *
 * @link        http://www.ppi.io
 */

namespace PPI\PlatesModule\Factory;

use League\Plates\Engine as PlatesEngine;
use PPI\PlatesModule\Wrapper\PlatesWrapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * PlatesWrapperFactory
 *
 * @author Paul Dragoonis <paul@ppi.io>
 */
class PlatesWrapperFactory implements FactoryInterface
{

    protected $defaultConfig = ['ext' => 'plates'];

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PlatesWrapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $platesEngine = $serviceLocator->get('plates.engine');

        $config = $serviceLocator->get('Config');
        if (!isset($config['plates']['ext'])) {
            $platesConfig = $this->defaultConfig;
        } else {
            $platesConfig = $config['plates'];
        }

        $ext = $platesConfig['ext'];

        $platesEngine->setFileExtension($ext);

        $platesWrapper = new PlatesWrapper(
            $platesEngine,
            $serviceLocator->get('templating.locator'),
            $serviceLocator->get('templating.name_parser'),
            $serviceLocator->get('templating.loader')
        );

        return $platesWrapper;
    }
}