<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Employer\Controller\Employer' => 'Employer\Controller\EmployerController',
        ),
    ),
	
    'router' => array(
        'routes' => array(
        
'empLogin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/empLogin',
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'empLogin',
                    ),
                ),
            ),
			
			
			'employerRegistration' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/employerRegistration',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'employerRegistration',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateemployerRegistration' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/updateemployerRegistration/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'updateemployerRegistration',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteemployerRegistration' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/deleteemployerRegistration/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'deleteemployerRegistration',
                    ),
                ),
				'may_terminate' => true,
            ),
            
'emailTemplate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/emailTemplate',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'emailTemplate',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateemailTemplate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/updateemailTemplate/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'updateemailTemplate',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteemailTemplate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/deleteemailTemplate/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'deleteemailTemplate',
                    ),
                ),
				'may_terminate' => true,
            ),
             
'SMSTemplate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/SMSTemplate',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'SMSTemplate',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateSMSTemplate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/updateSMSTemplate/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'updateSMSTemplate',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteSMSTemplate' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/deleteSMSTemplate/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'deleteSMSTemplate',
                    ),
                ),
				'may_terminate' => true,
            ),

'savedResumes' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/savedResumes',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'savedResumes',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatesavedResumes' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/updatesavedResumes/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'updatesavedResumes',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletesavedResumes' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/deletesavedResumes/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'deletesavedResumes',
                    ),
                ),
				'may_terminate' => true,
            ),               
    
'savedResumesSearches' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/savedResumesSearches',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'savedResumesSearches',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updatesavedResumesSearches' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/updatesavedResumesSearches/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'updatesavedResumesSearches',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deletesavedResumesSearches' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/deletesavedResumesSearches/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'deletesavedResumesSearches',
                    ),
                ),
				'may_terminate' => true,
            ), 
			   
			   'changePassword' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/changePassword[/:id]',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'changePassword',
                    ),
                ),
				'may_terminate' => true,
            ),
			'employerAccounts' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/employerAccounts',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'employerAccounts',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'updateemployerAccounts' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/updateemployerAccounts/[:id]/update',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'updateemployerAccounts',
                    ),
                ),
				'may_terminate' => true,
            ),
			
			'deleteemployerAccounts' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api/v1/employer/deleteemployerAccounts/[:id]/delete',
                     'constraints' => array(
                            'id' => '[0-9]+',
                         ),
                    'defaults' => array(
                        'controller' => 'Employer\Controller\Employer',
                        'action' => 'deleteemployerAccounts',
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
