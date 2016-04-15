<?php
namespace Register\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Debug\Debug;

class RegisterTable extends AbstractTableGateway
{
    
   protected $table ='users';
   
   public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
		$this->initialize();
    }
    public function getrandomdoctors($docnum)
    {
        
       $num = $docnum['num'];
     }
	 
	public function saveRegister($setdata)
    {
		$password =  md5($setdata['password']);
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('users');
		$select->where(array('email_id' => $setdata['email_id'])); 
		$select->getSqlString($this->adapter->getPlatform());
		  $result =$this->executeSelect($select);
		  $rows = array_values(iterator_to_array($result));
		  $response=array();
        if ( $result->count() >= 1 ) {
            $response = array('errorCode' => 513); 
             return $response;
        }
        else
        {
        
        try
        {
			$sql = new Sql($this->adapter);
			$insert = $sql->insert('users');
			$insert->values($setdata);
			$selectString = $sql->getSqlStringForSqlObject($insert);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
            $lastId = $this->adapter->getDriver()->getLastGeneratedValue();  //  getting last inserted id
            $response = array('id'=> $lastId, 'First Name' => $setdata['first_name'],'Last Name' => $setdata['last_name'] , 'token' => $setdata['token'],'status' => 'success');
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
        }
	}
	
	//login
	public function saveLogin($data)
    {

        $password =  md5($data->password);
		$sql = "SELECT * FROM `users` WHERE email_id = '".$data->email_id."' AND password ='".$password."'";	  // Check its already there or not  //  echo $sql; exit;
        $statement  = $this->adapter->query($sql);
        $result =  $statement->execute();
        $rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$response = array('firstname' => $rows[$key]['first_name'],'lastname' => $rows[$key]['last_name'],'status' => 'success');
				}
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	


     
}