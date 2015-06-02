<?php

/*
 * This file is part of the Mapbender 3 project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mapbender\OL3Bundle;

use Mapbender\CoreBundle\Component\MapbenderBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Mapbender\CoreBundle\DependencyInjection\Compiler\MapbenderYamlCompilerPass;

/**
 * OpenLayers3 bundle.
 *
 * @author Andreas Schmitz
 */
class MapbenderOL3Bundle extends MapbenderBundle
{

    /**
     * @inheritdoc
     */
    public function getTemplates()
    {
        return array();
    }

    /**
     * @inheritdoc
     */
    public function getElements()
    {
        return array(
            'Mapbender\OL3Bundle\Element\OL3Map'
        );
    }

    /**
     * @inheritdoc
     */
    public function getACLClasses()
    {
        return array();
    }

}
