<?php
//register
namespace Register\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Register\Model\RegisterTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\View\Model\JsonModel;


use Zend\Validator\Db\RecordExists;
use Zend\Validator;

use Zend\Http\Client as HttpClient;

use Register\Service\RegisterService;

use Zend\Cache\StorageFactory;


use Zend\Service\Manager\ServiceLocatorInterface;
use Zend\EventManager\EventManagerAware;


class RegisterController extends AbstractActionController
{

    public function signupAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
        $data = json_decode($body);
        
        
      // print_r($data); exit;
        if( !isset($data->first_name) || $data->first_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'First Name should not be empty');
          return new JsonModel($resp);
        }
        if( !isset($data->last_name) || $data->last_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Last Name should not be empty');
          return new JsonModel($resp);
        }
         if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Email should not be empty');
          return new JsonModel($resp);
        }
        
        if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->confirm_password) || $data->confirm_password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Confirm Password should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->contact_no) || $data->contact_no == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Contact Number should not be empty');
          return new JsonModel($resp);
        }
		
		$sm = $this->getServiceLocator();
		$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $registerService = new RegisterService($dbAdapter);
        $resp = $registerService->signup($data);
        
        
        if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Username already registered'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
        return new JsonModel($resp);
    }
    
    
public function candidateLoginAction()
    {
		
		
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
        $data = json_decode($body);
             
       
        if(!isset($data->email_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
        if(!isset($data->password)) {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
         
		$sm = $this->getServiceLocator();
		$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $registerService = new RegisterService($dbAdapter);
        $resp = $registerService->userLogindata($data);
        
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Email ID or Password does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
        return new JsonModel($resp);
    }
     
	
    
}