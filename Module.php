<?php
/**
 * This file is part of the PPI Framework.
 *
 * @copyright   Copyright (c) 2014 Paul Dragoonis <paul@ppi.io>
 * @license     http://opensource.org/licenses/mit-license.php MIT
 * @link        http://www.ppi.io
 */

namespace PPI\PlatesModule;

use PPI\Autoload;
use PPI\Module\AbstractModule;
use PPI\PlatesModule\Factory\PlatesWrapperFactory;

/**
 * PPI Plates Module.
 *
 * @author Vítor Brandão <vitor@ppi.io>
 * @author Paul Dragoonis <paul@ppi.io>
 */
class Module extends AbstractModule
{

    protected $name = 'PPIPlatesModule';

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return ['plates' => $this->loadConfig(__DIR__.'/resources/config/plates.php')];
    }

    public function getServiceConfig()
    {
        return ['factories' = [
            'templating.engine.plate' => PlatesWrapperFactory::class
        ]];
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }
}
