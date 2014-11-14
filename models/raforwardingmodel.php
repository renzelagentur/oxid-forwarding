<?php

/**
 * raforwardingmodel
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
class raforwardingmodel extends oxBase
{

    /**
     * @var string
     */
    protected $_sClassName = 'raforwardingmodel';

    /**
     * @var string
     */
    protected $_sCoreTable = 'raforwarding';

    /**
     * initialize the model
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    /**
     * getter for active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->getFieldData('ACTIVE');
    }

    /**
     * setter for active
     *
     * @param boolean $blActive active flag
     *
     * @return $this
     */
    public function setActive($blActive)
    {
        $this->_setFieldData('ACTIVE', $blActive);

        return $this;
    }
}
