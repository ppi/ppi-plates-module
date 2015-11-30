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
use PPI\PlatesTemplating\PlatesWrapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * PlatesWrapperFactory
 *
 * @author Paul Dragoonis <paul@ppi.io>
 */
class PlatesWrapperFactory implements FactoryInterface
{

    protected $defaultConfig = [
        'ext' => 'plate'
    ];

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PlatesWrapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        var_dump(__METHOD__); exit;
        $platesEngine = new PlatesEngine();

        $config = $serviceLocator->get('Config');
        if (!isset($config['templating']['plates'])) {
//            throw new \RuntimeException('No Plates Templating Configuration Found');
            $platesConfig = $defaultConfig;
        } else {
            $defaultConfig = $config['templating']['plates'];
        }

        // @todo - config file ext
        if (!isset($platesConfig['ext'])) {
            $ext = self::$defaultConfig['ext'];
        }

        $platesEngine->setFileExtension($ext);

        $platesWrapper = new PlatesWrapper($platesEngine);

        return $platesWrapper;
    }