<?php
namespace Products;

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
                'Products\Model\ProductsTable' =>  function($sm) {
                    $tableGateway = $sm->get('ProductsTableGateway');
                    $table = new ProductsTable($tableGateway);
                    return $table;
                },
                'ProductsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Register());
                    return new TableGateway('products', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
	
	
	
	
	
	
}