<?php

// Dashboard
CroogoRouter::connect('/dashboard/*', array(
	'plugin' => 'pride', 'controller' => 'campaigns', 'action' => 'index',
));

//// Organization
CroogoRouter::connect('/organizations/*', array(
	'plugin' => 'pride', 'controller' => 'organizations', 'action' => 'index',
));

// Campaign
CroogoRouter::connect('/campaigns/*', array(
	'plugin' => 'pride', 'controller' => 'campaigns', 'action' => 'index',
));


// Depot
CroogoRouter::connect('/depots/*', array(
	'plugin' => 'pride', 'controller' => 'depots', 'action' => 'index',
));

// Depot
CroogoRouter::connect('/provision_my_bus/*', array(
	'plugin' => 'pride', 'controller' => 'provision_buses', 'action' => 'index',
));

// Depot
CroogoRouter::connect('/my_order/*', array(
	'plugin' => 'pride', 'controller' => 'campaign_orders', 'action' => 'view',
));

// ajax suggest
// http://nuts-and-bolts-of-cakephp.com/2013/08/27/cakephp-and-jquery-auto-complete-revisited/
Router::parseExtensions();

