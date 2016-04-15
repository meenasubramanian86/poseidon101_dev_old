<?php
return array(
    
    
    'controllers' => array(
        'invokables' => array(
            'Lib\Controller\Lib' => 'Lib\Controller\LibController',
            
        ),
    ),
	
    'router' => array(
        'routes' => array(

          
			
				'area' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/area[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'area',
                    ),
                ),
				'may_terminate' => true,
            ),

            	'state' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/state',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'state',
                    ),
                ),
				'may_terminate' => true,
            ),

            	'addskills' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/addskills',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'addskills',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateskills' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/updateskills[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'updateskills',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteskills' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/deleteskills[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'deleteskills',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'city' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/city[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'city',
                    ),
                ),
				'may_terminate' => true,
            ),	
			
			'addLanguage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/addLanguage',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'addLanguage',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateLanguage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/updateLanguage[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'updateLanguage',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteLanguage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/deleteLanguage[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'deleteLanguage',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'addFeedback' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/addFeedback',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'addLanguage',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateFeedback' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/updateFeedback[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'updateFeedback',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteFeedback' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/lib/deleteFeedback[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Lib\Controller\Lib',
                        'action' => 'deleteFeedback',
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
