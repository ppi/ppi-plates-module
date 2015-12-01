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

use PPI\PlatesModule\PlatesEngine;
use PPI\PlatesModule\PlatesEngine\Factory\NameFactory;
use PPI\PlatesModule\Wrapper\PlatesWrapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * PlatesWrapperFactory
 *
 * @author Paul Dragoonis <paul@ppi.io>
 */
class PlatesEngineFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PlatesWrapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // @todo - find out pre-defined folders and assign them
        $engine = new PlatesEngine();
        $engine->setDirectory($serviceLocator->get('templating.locator')->getAppPath());

        $config = $serviceLocator->get('Config');
        if(isset($config['plates']['folders'])) {
            foreach($config['plates']['folders'] as $folderName => $path) {
                $engine->addFolder($folderName, rtrim($path, '/'));
            }
        }

        return $engine;
    }
}