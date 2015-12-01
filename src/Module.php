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
use PPI\Framework\Module\AbstractModule;
use PPI\PlatesModule\Factory\PlatesWrapperFactory;
use PPI\PlatesModule\Factory\PlatesEngineFactory;

/**
 * PPI Plates Module.
 *
 * @author Vítor Brandão <vitor@ppi.io>
 * @author Paul Dragoonis <paul@ppi.io>
 */
class Module extends AbstractModule
{

    public function getName()
    {
        return 'PlatesModule';
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return ['plates' => $this->loadConfig(__DIR__.'/../resources/config/config.php')];
    }

    public function getServiceConfig()
    {
        return ['factories' => [
            'templating.engine.plates' => PlatesWrapperFactory::class,
            'plates.engine' => PlatesEngineFactory::class
        ]];
    }
}
