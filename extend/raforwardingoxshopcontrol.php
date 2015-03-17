<?php
/**
 * raforwardingoxshopcontrol
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 */
class raforwardingoxshopcontrol extends raforwardingoxshopcontrol_parent
{

    /**
     * @var \raforwardinglist
     */
    protected $_aForwardings;

    /**
     * redircts to special url
     *
     * @param string $sClass      Class name
     * @param string $sFunction   Funtion name
     * @param array  $aParams     Parameters array
     * @param array  $aViewsChain Array of views names that should be initialized also
     *
     * @return null
     */
    public function start($sClass = null, $sFunction = null, $aParams = null, $aViewsChain = null)
    {
        $aForwardings = $this->getForwardings();
        $aForwardings->loadActive();
        foreach ($aForwardings as $oForwarding) {
            $sOrigin = preg_replace('#^http(s)?://#', '', trim($oForwarding->raforwarding__origin->value, '/'));
            $sTarget = $oForwarding->raforwarding__target->value;
            if ($sOrigin === trim(urldecode(oxRegistry::get('oxUtilsServer')->getServerVar('HTTP_HOST')), '/')) {
                header('Location: ' . $sTarget);
                exit;
            }
        }
        parent::start($sClass, $sFunction, $aParams, $aViewsChain);
    }

    /**
     * get active forwarding list
     *
     * @return \raforwardinglist
     */
    public function getForwardings()
    {
        if ($this->_aForwardings === null) {
            $this->_aForwardings = oxNew('raforwardinglist');
        }

        return $this->_aForwardings;
    }
}
