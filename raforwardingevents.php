<?php
/**
 * raforwardingevents
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 */
class raforwardingevents
{

    /**
     * creates a new table
     */
    public static function onActivate()
    {
        $oDB = oxDb::getDb();
        $oDB->execute(
            'CREATE TABLE IF NOT EXISTS raforwarding (
            `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
            `TITLE` varchar(255) NOT NULL,
            `ORIGIN` varchar(255) NOT NULL,
            `TARGET` varchar(255) NOT NULL,
            `ACTIVE` tinyint(1) NOT NULL DEFAULT "1",
            `OXSHOPID` int(11) NOT NULL,
            `OXPARENTID` char(32) DEFAULT NULL,
            PRIMARY KEY (`OXID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
    }
}
