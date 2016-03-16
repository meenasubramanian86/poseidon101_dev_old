<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
        ),
    ),
	
    'router' => array(
        'routes' => array(
		
			'allCount' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/allCount',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'allCount',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatespecialization' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/updatespecialization/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'updatespecialization',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletespecialization' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/deletespecialization/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'deletespecialization',
                    ),
                ),
				'may_terminate' => true,
            ),

			'specializationName' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/specializationName',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'specializationName',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatecourses' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/updatecourses/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'updatecourses',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletecourses' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/deletecourses/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'deletecourses',
                    ),
                ),
				'may_terminate' => true,
            ),

			'coursesName' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/coursesName',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'coursesName',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateeducation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/updateeducation/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'updateeducation',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteeducation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/deleteeducation/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'deleteeducation',
                    ),
                ),
				'may_terminate' => true,
            ),

			'universityName' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/universityName',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'universityName',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatecollege' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/updatecollege/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'updatecollege',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletecollege' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/deletecollege/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'deletecollege',
                    ),
                ),
				'may_terminate' => true,
            ),

			'collegeName' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/collegeName',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'collegeName',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'JobsApplied' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/JobsApplied',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'JobsApplied',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'statesMaster' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/statesMaster',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'statesMaster',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'citiesMaster' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/citiesMaster',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'citiesMaster',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'areasMaster' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/areasMaster',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'areasMaster',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'countriesMaster' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/countriesMaster',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'countriesMaster',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'adminManageCandidate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/adminManageCandidate',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'adminManageCandidate',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'adminManageEmployer' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/adminManageEmployer',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'adminManageEmployer',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'adminBanners' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/selectBanners/[:id]/adminBanners',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\adminBanners',
                        'action' => 'adminBanners',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'adminaddjobs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/Admin/addJobs/[:id]/adminaddjobs',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\adminaddjobs',
                        'action' => 'adminaddjobs',
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
