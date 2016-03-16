<?php
namespace Employer;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}
	
	
	public function getConfig()
	{
		return include __DIR__ . '/config/module_config.php'; 
	}
	
	
	
	// Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Employer\Model\EmployerTable' =>  function($sm) {
                    $tableGateway = $sm->get('EmployerTableGateway');
                    $table = new EmployerTable($tableGateway);
                    return $table;
                },
                'EmployerTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Register());
                    return new TableGateway('employer', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
	
	
	
	
	
	
}