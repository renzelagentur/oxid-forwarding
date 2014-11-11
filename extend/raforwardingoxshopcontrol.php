<?php
/**
 * raforwardingoxshopcontrol.php
 *
 * @version   GIT: $Id$ PHP5.4 (16.10.2014)
 * @author    Robin Lehrmann <info@renzel-agentur.de>
 * @copyright Copyright (C) 22.10.2014 renzel.agentur GmbH. All rights reserved.
 * @license   http://www.renzel-agentur.de/licenses/raoxid-1.0.txt
 * @link      http://www.renzel-agentur.de/
 *
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
