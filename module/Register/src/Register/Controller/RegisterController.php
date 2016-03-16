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
        
        if( !isset($data->user_type) || $data->user_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User Type should not be empty');
          return new JsonModel($resp);
        }
        
        if( !isset($data->address1) || $data->address1 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address 1 should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->address2) || $data->address2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address 2 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->country) || $data->country == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Country should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->state) || $data->state == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'State should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->city) || $data->city == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'City should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->area) || $data->area == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Area should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->postal_code) || $data->postal_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Postal Code should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->latitude) || $data->latitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Latitude should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->longitude) || $data->longitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Longititud should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->gender) || $data->gender == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Gender should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->birthdate) || $data->birthdate == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Birth Date should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone) || $data->phone == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone2) || $data->phone2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone 2 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone3) || $data->phone3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone 3 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->mobile) || $data->mobile == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->mobile2) || $data->mobile2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile 2 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->mobile3) || $data->mobile3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile 3 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->profile_picture) || $data->profile_picture == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Profile Picture should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->blood_group_id) || $data->blood_group_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Blood Group ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->blood_donation) || $data->blood_donation == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Blood Donation should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->verification_code) || $data->verification_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Verfication code should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_verified) || $data->is_verified == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Verified should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->last_login) || $data->last_login == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Last Login should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->role_default_id) || $data->role_default_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Role Default ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->secret_question) || $data->secret_question == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Secret Question should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->secret_answer) || $data->secret_answer == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Secret Answer should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_profile_completed) || $data->is_profile_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Profile Completed should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_profile_ms_completed) || $data->is_profile_ms_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Profile MS Completed should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'CreatedBy should not be empty');
          return new JsonModel($resp);
        }
        
       if(!is_numeric($data->is_active)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Active should not be empty');
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