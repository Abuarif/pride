<?php 

/**
 * Admin menu (navigation)
 */
CroogoNav::add('sidebar', 'pride', array(
	'icon' => array('columns', 'large'),
	'title' => __d('croogo', 'PRIDE - AMS'),
	'url' => '#',
	'weight' => 1,
	'children' => array(
		'item1' => array(
			'title' => 'Advertiser Lists',
			'url' => '#',
			'weight' => 1,
				'children' => array(
				'item1a' => array(
					'title' => 'Organizations',
					'weight' => 1,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'organizations',
						'action' => 'index',
					),
				),
				'item1b' => array(
					'title' => 'Campaigns',
					'weight' => 2,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'campaigns',
						'action' => 'index',
					),
				),
				'item1c' => array(
					'title' => 'Visuals',
					'weight' => 3,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'campaign_designs',
						'action' => 'index',
					),
				),
			),
		),
		'item2a' => array(
			'title' => 'Product Packages',
			'weight' => 2,
			'url' => array(
				'admin' => true,
				'plugin' => 'pride',
				'controller' => 'packages',
				'action' => 'index',
			),
		),
		'item2b' => array(
			'title' => 'Product Settings',
			'url' => '#',
			'weight' => 3,
				'children' => array(
				'item3' => array(
					'title' => 'Depots',
					'weight' => 1,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'depots',
						'action' => 'index',
					),
				),
				'item4' => array(
					'title' => 'Routes',
					'weight' => 2,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'routes',
						'action' => 'index',
					),
				),
				'item5' => array(
					'title' => 'Route Details',
					'weight' => 3,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'route_details',
						'action' => 'index',
					),
				),
				'item6' => array(
					'title' => 'Buses',
					'weight' => 4,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'buses',
						'action' => 'index',
					),
				),
			),
		),
		'item3' => array(
			'title' => 'Work Processes',
			'url' => '#',
			'weight' => 4,
				'children' => array(
				'item3a' => array(
					'title' => 'Status Definitions',
					'weight' => 1,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'process_states',
						'action' => 'index',
					),
				),
				'item3b' => array(
					'title' => 'Document References',
					'weight' => 1,
					'url' => array(
						'admin' => true,
						'plugin' => 'pride',
						'controller' => 'document_references',
						'action' => 'index',
					),
				),				
			),
		),		
	),
));
