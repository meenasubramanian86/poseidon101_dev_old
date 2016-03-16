<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Products\Controller\Products' => 'Products\Controller\ProductsController',
        ),
    ),
	
    'router' => array(
        'routes' => array(
        
'addProducts' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Products/addProducts',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action' => 'addProducts',
                    ),
                ),
				'may_terminate' => true,
            ),
	
	
			'updateProducts' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Products/updateProducts/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action' => 'updateProducts',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteProducts' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Products/deleteProducts/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action' => 'deleteProducts',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			
			'addBanners' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Products/addBanners',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action' => 'addBanners',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateBanners' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Products/updateBanners/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action' => 'updateBanners',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteBanners' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Products/deleteBanners/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action' => 'deleteBanners',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			
	
        ),
    ),
 	
	'view_manager'	=> array(
        'strategies' => array(
             'ViewJsonStrategy',
             ),

        
	),
	
	
);
