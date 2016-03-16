<?php
return array(
    
    
    'controllers' => array(
        'invokables' => array(
            'Users\Controller\Users' => 'Users\Controller\UsersController',
            
        ),
    ),
	
    'router' => array(
        'routes' => array(

                  
			'latestJobs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/latestJobs',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'latestJobs',
                    ),
                ),
				'may_terminate' => true,
            ),
			'featuredJobs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/featuredJobs',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'featuredJobs',
                    ),
                ),
				'may_terminate' => true,
            ),
			'featuredCompanies' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/featuredCompanies',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'featuredCompanies',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'savedJobsSearches' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/savedJobsSearches',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'savedJobsSearches',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatesavedJobsSearches' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updatesavedJobsSearches/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updatesavedJobsSearches',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'addsavedJobs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/addsavedJobs',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'addsavedJobs',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatesavedJobs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updatesavedJobs/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updatesavedJobs',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletesavedJobs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deletesavedJobs/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deletesavedJobs',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletesavedJobsSearches' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deletesavedJobsSearches/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deletesavedJobsSearches',
                    ),
                ),
				'may_terminate' => true,
            ),
				
			
	'updateMyAccount' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updateMyAccount[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updateMyAccount',
                    ),
                ),
				'may_terminate' => true,
            ),
			'deleteMyAccount' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deleteMyAccount[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deleteMyAccount',
                    ),
                ),
				'may_terminate' => true,
            ),
			'updateJobDesc' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updateJobDesc[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updateJobDesc',
                    ),
                ),
				'may_terminate' => true,
            ),
			'deleteJobDesc' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deleteJobDesc[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deleteJobDesc',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'password' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/password[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'password',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'insertprofessionalDetails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/insertprofessionalDetails',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'insertprofessionalDetails',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateprofessionalDetails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updateprofessionalDetails[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updateprofessionalDetails',
                    ),
                ),
				'may_terminate' => true,
            ),
			'deleteprofessionalDetails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deleteprofessionalDetails[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deleteprofessionalDetails',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'insertpersonalDetails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/insertpersonalDetails',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'insertpersonalDetails',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatepersonalDetails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updatepersonalDetails[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updatepersonalDetails',
                    ),
                ),
				'may_terminate' => true,
            ),
			'deletepersonalDetails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deletepersonalDetails[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deletepersonalDetails',
                    ),
                ),
				'may_terminate' => true,
            ),

			'inserteducationalcertification' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/inserteducationalcertification',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'inserteducationalcertification',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateeducationalcertification' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updateeducationalcertification[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updateeducationalcertification',
                    ),
                ),
				'may_terminate' => true,
            ),
			'deleteeducationalcertification' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deleteeducationalcertification[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deleteeducationalcertification',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'inserteducationalgraduation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/inserteducationalgraduation',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'inserteducationalgraduation',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateeducationalgraduation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/updateeducationalgraduation[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'updateeducationalgraduation',
                    ),
                ),
				'may_terminate' => true,
            ),
			'deleteeducationalgraduation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/deleteeducationalgraduation[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'deleteeducationalgraduation',
                    ),
                ),
				'may_terminate' => true,
            ),

			'skillssearch' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/skillssearch',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'skillssearch',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'visiblitySettings' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/users/visiblitySettings[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action' => 'visiblitySettings',
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
