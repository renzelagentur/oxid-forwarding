<?php
/**
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'raforwarding',
    'title'       => 'ra forwarding',
    'description' => array(
        'de' => 'Modul zum erstellen und bearbeiten von Weiterleitungen',
        'en' => 'RA Forwarding lets you create custom 301 Redirects with origin and target for each shop',
    ),
    'thumbnail'   => 'picture.jpg',
    'version'     => '1.1.2',
    'author'      => 'Mathis Schülingkamp',
    'url'         => 'http://www.renzel-agentur.de',
    'email'       => 'info@renzel-agentur.de',
    'extend'      => array(
        'oxseodecoder'  => 'ra/forwarding/extend/raforwardingoxseodecoder',
        'oxshopcontrol' => 'ra/forwarding/extend/raforwardingoxshopcontrol'
    ),
    'templates'   => array(
        'admin/forwarding.tpl'      => 'ra/forwarding/views/admin/tpl/forwarding.tpl',
        'admin/forwarding_list.tpl' => 'ra/forwarding/views/admin/tpl/forwarding_list.tpl',
        'admin/forwarding_main.tpl' => 'ra/forwarding/views/admin/tpl/forwarding_main.tpl'
    ),
    'files'       => array(
        'raforwardingevents'      => 'ra/forwarding/events.php',
        'admin_raforwarding'      => 'ra/forwarding/controllers/admin/raforwarding.php',
        'admin_raforwarding_main' => 'ra/forwarding/controllers/admin/raforwarding_main.php',
        'admin_raforwarding_list' => 'ra/forwarding/controllers/admin/raforwarding_list.php',
        'raforwardingmodel'       => 'ra/forwarding/models/raforwardingmodel.php',
        'raforwardinglist'        => 'ra/forwarding/models/raforwardinglist.php'
    ),
    'events'      => array(
        'onActivate' => 'raforwardingevents::onActivate'
    )
);
