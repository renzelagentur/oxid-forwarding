<?php

/**
 * raforwardingoxseodecoder
 *
 * @package   MODULNAME
 * @version   GIT: $Id$ PHP5.4 (16.10.2014)
 * @author    Robin Lehrmann <info@renzel-agentur.de>
 * @copyright Copyright (C) 22.10.2014 renzel.agentur GmbH. All rights reserved.
 * @license   http://www.renzel-agentur.de/licenses/raoxid-1.0.txt
 * @link      http://www.renzel-agentur.de/
 * @extend    EXTENDEDCLASS
 *
 */
class raforwardingoxseodecoder extends raforwardingoxseodecoder_parent
{

    /**
     * @var \raforwardinglist
     */
    protected $_aForwardings;

    /**
     * redirects if the seourl matches
     *
     * @param string $sSeoUrl seo url to analyse
     *
     * @return mixed
     */
    public function decodeUrl($sSeoUrl)
    {
        $aForwardings = $this->getForwardings();
        $aForwardings->loadActive();
        /* @var $oForwarding \raforwardingmodel */
        foreach ($aForwardings as $oForwarding) {
            $sOrigin = trim($oForwarding->raforwarding__origin->value, '/');
            $sTarget = $oForwarding->raforwarding__target->value;
            if ($sOrigin === trim(urldecode($sSeoUrl), '/')) {
                if (substr($sOrigin, 0, 4) == 'http') {
                    $sTarget = '/' . trim($oForwarding->raforwarding__target->value, '/');
                }
                header('Location: ' . $sTarget);
                exit;
            }
        }

        return parent::decodeUrl($sSeoUrl);
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
