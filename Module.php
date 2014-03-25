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

/**
 * PPI Plates Module.
 *
 * @author Vítor Brandão <vitor@ppi.io>
 */
class Module extends AbstractModule
{
    const VERSION = '0.0.1-DEV';

    /**
     * {@inheritDoc}
     */
    public function init($e)
    {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'PPIPlatesModule';
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        // return array('plates' => $this->loadConfig('plates.php'));
        // or
        return array('plates' => require_once __DIR__.'/resources/config/plates.php');

    }
}
