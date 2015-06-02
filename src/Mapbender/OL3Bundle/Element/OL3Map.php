<?php
namespace Mapbender\OL3Bundle\Element;

use Mapbender\CoreBundle\Component\Element;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class OL3Map extends Element
{

    /**
     * @inheritdoc
     */
    static public function getClassTitle()
    {
        return "OpenLayers3 Map";
    }

    /**
     * @inheritdoc
     */
    static public function getClassDescription()
    {
        return "A map implementation using OpenLayers3";
    }

    /**
     * @inheritdoc
     */
    static public function getClassTags()
    {
        return array();
    }

    /**
     * @inheritdoc
     */
    static public function listAssets()
    {
        return array(
            'js' => array(
                'mapbender.element.ol3map.js',
                '/components/openlayers3/ol.js'
            ),
            'css' => array(
                '/components/openlayers3/ol.css'
            ));
    }

    /**
     * @inheritdoc
     */
    public static function getDefaultConfiguration()
    {
        return array();
    }

    /**
     * @inheritdoc
     */
    public static function getType()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public static function getFormTemplate()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getWidgetName()
    {
        return 'mapbender.ol3map';
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        return $this->container->get('templating')
                ->render('MapbenderOL3Bundle:Element:ol3map.html.twig',
                    array(
                    'id' => $this->getId(),
                    'title' => $this->getTitle(),
                    'configuration' => $this->getConfiguration()));
    }

}
