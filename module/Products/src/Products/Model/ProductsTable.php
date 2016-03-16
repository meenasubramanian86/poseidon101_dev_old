<?php
namespace Products\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Debug\Debug;

class ProductsTable extends AbstractTableGateway
{
    
   protected $table ='users';
   public $id;
   //public $doctor_id;
	
	 public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
		$this->initialize();
    }
	
	public function addProductsAction($setdata)
    {
		
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('products');
		$insert->values($setdata);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
 
		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
	
	public function updateproductsAction($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('products');
		$update->set($setdata);
		$update->where($where);
	    $selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
 
		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
		
	public function deleteproductsAction($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('products');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
 
		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
	
	public function addBannersAction($setdata)
    {
		
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('banners');
		$insert->values($setdata);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
 
		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
	
	public function updateBannersAction($setdata,$where)
    {
		
 		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('banners');
		$update->set($setdata);
		$update->where($where);
	    $selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
 
		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
		
	public function deleteBannersAction($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('banners');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
 
		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
	

	
}
