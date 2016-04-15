<?php
namespace Register\Service;
use Zend\View\Model\ViewModel;
use Register\Model\RegisterTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;
use Zend\Validator\Db\RecordExists;


class RegisterService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }

    public function signup($data)
    {
	//echo "fsd"; exit;
		$date = date('Y-m-d H:i:s');
		$setdata = array();
		$token = md5($data->email_id.time());
		$password =  md5($data->password);
		$setdata['token'] = $token;
		$setdata['first_name'] = $data->first_name;
		$setdata['last_name'] = $data->last_name;
		$setdata['email_id'] = $data->email_id;
		$setdata['password'] = $password;
		$setdata['confirm_password'] = $password;
		$setdata['contact_no'] = $data->contact_no;
		
		$registerTable = new RegisterTable($this->adapter);
		$res = $registerTable->saveRegister($setdata);	
        return $res;
    }
    
   public function userLogindata($data)
    {
		$registerTable = new RegisterTable($this->adapter);
		$res = $registerTable->saveLogin($data);	
        return $res;
    }
	

    
}
