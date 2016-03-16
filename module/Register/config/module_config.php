<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Register\Controller\Register' => 'Register\Controller\RegisterController',
        ),
    ),
	
    'router' => array(
        'routes' => array(
        

          		
		  'signup' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/candidate/signup',
                    'defaults' => array(
                        'controller' => 'Register\Controller\Register',
                        'action' => 'signup',
                    ),
                ),
            ),
            
			'candidateLogin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/candidate/candidateLogin',
                    'defaults' => array(
                        'controller' => 'Register\Controller\Register',
                        'action' => 'candidateLogin',
                    ),
                ),
            ),
            

            
            
        ),
    ),
 	
	'view_manager'	=> array(
        'strategies' => array(
             'ViewJsonStrategy',
             ),
		//'template_path_stack'	=> array(
		//	'Register'	=> __DIR__ . '/../view',
		//),
        
	),
	
	
);
