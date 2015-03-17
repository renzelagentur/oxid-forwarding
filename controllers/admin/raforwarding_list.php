<?php
/**
 * admin_raforwarding_list
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 * @extends   oxAdminList
 */
class admin_raforwarding_list extends oxAdminList
{

    /**
     * @var string
     */
    protected $_sThisTemplate = 'admin/forwarding_list.tpl';

    /**
     * @var string
     */
    protected $_sDefSortField = 'TITLE';

    /**
     * @var string
     */
    protected $_sListClass = 'raforwardingmodel';

    /**
     * Method which builds the where-clause
     *
     * @return array
     */
    public function buildWhere()
    {
        $aWhere = parent::buildWhere();
        $aWhere['oxshopid'] = $this->getConfig()->getShopId();

        return $aWhere;
    }
}
