<?php
//Employer
namespace Employer\Controller;

use Zend\Validator\AbstractValidator;
use Zend\Mvc\Controller\AbstractRestfulController;

use Zend\View\Model\JsonModel;

use Zend\Http\Response;
use Employer\Service\EmployerService;

use Zend\Http\Client as HttpClient;



class EmployerController extends AbstractRestfulController
{
public function manageJobsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		/*if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}*/
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$employerService = new EmployerService($dbAdapter);
				$resp = $employerService->manageJobsSelectService();
			}
		 
		 return new JsonModel($resp);
   
	}
	
public function empLoginAction()
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
        $employerService = new EmployerService($dbAdapter);
        $resp = $employerService->empLogindata($data);
        
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

public function employerRegistrationAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->company_name) || $data->company_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Company Name should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->company_short_name) || $data->company_short_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Company Short Name should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
		
		
		
         if( !isset($data->position) || $data->position == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Position should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->company_type) || $data->company_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Company Type should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->website_url) || $data->website_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Website URL should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->industry) || $data->industry== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Industry should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->company_discription) || $data->company_discription == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Company Description should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->logo) || $data->logo == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Logo should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->linkedin_url) || $data->linkedin_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Linked URL should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->facebook_url) || $data->facebook_url== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Facebook URL should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->twitter_url) || $data->twitter_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Twitter URL should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->is_mail_send) || $data->is_mail_send == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Mail Send should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->address1) || $data->address1 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Address1 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->address2) || $data->address2== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address2 should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->country) || $data->country == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Country should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->state) || $data->state == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'State should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->city) || $data->city == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->area) || $data->area== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Area should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->postal_code) || $data->postal_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Postal Code should not be empty');
          return new JsonModel($resp);
        }
    
         if(!is_numeric($data->postal_code)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Postal Code should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone2)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone2 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone3)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone3 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile2)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile2 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile3)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile3 should be numeric');
          return new JsonModel($resp);
        } 
        if( !isset($data->latitude) || $data->latitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Latitude should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->longitude) || $data->longitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Longitude should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone) || $data->phone== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->phone2) || $data->phone2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Phone2 should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->phone3) || $data->phone3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Phone3 should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->mobile) || $data->mobile == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Mobile should not be empty');
          return new JsonModel($resp);
        }
		
        if( !isset($data->mobile2) || $data->mobile2== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile2 should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->mobile3) || $data->mobile3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Mobile3 should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->profile_picture) || $data->profile_picture == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Profile Picture should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->verification_code) || $data->verification_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Verification Code should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_verified) || $data->is_verified== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Verified should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->last_login) || $data->last_login == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Last Login should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->secret_question) || $data->secret_question == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Secret Question should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->secret_answer) || $data->secret_answer == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Secret Answer should not be empty');
          return new JsonModel($resp);
        }
		
		 if( !isset($data->is_profile_completed) || $data->is_profile_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Profile Completed should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->addemployerRegistration($data);
			}
		}
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
	
public function updateemployerRegistrationAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$employer_id = $this->params('id');
 
		if( !isset($employer_id) || $employer_id == '' || $employer_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->company_name) || $data->company_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Company Name should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->company_short_name) || $data->company_short_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Company Short Name should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->token) || $data->token== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Token should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->position) || $data->position == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Position should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->company_type) || $data->company_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Company Type should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->website_url) || $data->website_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Website URL should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->industry) || $data->industry== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Industry should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->company_discription) || $data->company_discription == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Company Description should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->logo) || $data->logo == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Logo should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->linkedin_url) || $data->linkedin_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Linked URL should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->facebook_url) || $data->facebook_url== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Facebook URL should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->twitter_url) || $data->twitter_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Twitter URL should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->is_mail_send) || $data->is_mail_send == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Mail Send should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->address1) || $data->address1 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Address1 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->address2) || $data->address2== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address2 should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->country) || $data->country == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Country should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->state) || $data->state == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'State should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->city) || $data->city == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->area) || $data->area== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Area should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->postal_code) || $data->postal_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Postal Code should not be empty');
          return new JsonModel($resp);
        }
    
         if(!is_numeric($data->postal_code)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Postal Code should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone2)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone2 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone3)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone3 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile2)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile2 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile3)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile3 should be numeric');
          return new JsonModel($resp);
        } 
        if( !isset($data->latitude) || $data->latitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Latitude should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->longitude) || $data->longitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Longitude should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone) || $data->phone== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->phone2) || $data->phone2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Phone2 should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->phone3) || $data->phone3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Phone3 should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->mobile) || $data->mobile == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Mobile should not be empty');
          return new JsonModel($resp);
        }
		
        if( !isset($data->mobile2) || $data->mobile2== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile2 should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->mobile3) || $data->mobile3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Mobile3 should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->profile_picture) || $data->profile_picture == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Profile Picture should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->verification_code) || $data->verification_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Verification Code should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_verified) || $data->is_verified== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Verified should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->last_login) || $data->last_login == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Last Login should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->secret_question) || $data->secret_question == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Secret Question should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->secret_answer) || $data->secret_answer == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Secret Answer should not be empty');
          return new JsonModel($resp);
        }
		
		 if( !isset($data->is_profile_completed) || $data->is_profile_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Profile Completed should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->updateemployerRegistration($data,$employer_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
   
	}
	
	public function deleteEmployerRegistrationAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		 
        $employer_id = $this->params('id');
 
		if( !isset($employer_id) || $employer_id == '' || $employer_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		
		 if( !isset($data->company_name) || $data->company_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Company Name should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->company_short_name) || $data->company_short_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Company Short Name should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->token) || $data->token== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Token should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->position) || $data->position == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Position should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->company_type) || $data->company_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Company Type should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->website_url) || $data->website_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Website URL should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->industry) || $data->industry== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Industry should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->company_discription) || $data->company_discription == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Company Description should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->logo) || $data->logo == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Logo should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->linkedin_url) || $data->linkedin_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Linked URL should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->facebook_url) || $data->facebook_url== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Facebook URL should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->twitter_url) || $data->twitter_url == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Twitter URL should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->is_mail_send) || $data->is_mail_send == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Mail Send should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->address1) || $data->address1 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Address1 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->address2) || $data->address2== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address2 should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->country) || $data->country == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Country should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->state) || $data->state == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'State should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->city) || $data->city == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->area) || $data->area== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Area should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->postal_code) || $data->postal_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Postal Code should not be empty');
          return new JsonModel($resp);
        }
    
         if(!is_numeric($data->postal_code)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Postal Code should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone2)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone2 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->phone3)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone3 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile2)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile2 should be numeric');
          return new JsonModel($resp);
        } 
		 if(!is_numeric($data->mobile3)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile3 should be numeric');
          return new JsonModel($resp);
        } 
        if( !isset($data->latitude) || $data->latitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Latitude should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->longitude) || $data->longitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Longitude should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone) || $data->phone== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->phone2) || $data->phone2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Phone2 should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->phone3) || $data->phone3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Phone3 should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->mobile) || $data->mobile == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Mobile should not be empty');
          return new JsonModel($resp);
        }
		
        if( !isset($data->mobile2) || $data->mobile2== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile2 should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->mobile3) || $data->mobile3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Mobile3 should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->profile_picture) || $data->profile_picture == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Profile Picture should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->verification_code) || $data->verification_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Verification Code should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_verified) || $data->is_verified== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Verified should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->last_login) || $data->last_login == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Last Login should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->secret_question) || $data->secret_question == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Secret Question should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->secret_answer) || $data->secret_answer == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Secret Answer should not be empty');
          return new JsonModel($resp);
        }
		
		 if( !isset($data->is_profile_completed) || $data->is_profile_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Profile Completed should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
		
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->deleteEmployerRegistration($data,$employer_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
   
	}	
	
public function emailTemplateAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->template_id) || $data->template_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Template ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->status) || $data->status == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Status should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_default) || $data->is_default == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Default should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->addemailTemplate($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}

public function updateemailTemplateAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$email_template_id = $this->params('id');
 
		if( !isset($email_template_id) || $email_template_id == '' || $email_template_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Email Template Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->template_id) || $data->template_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Template ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->status) || $data->status == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Status should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_default) || $data->is_default == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Default should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->updateemailTemplate($data,$email_template_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}	

public function deleteemailTemplateAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$email_template_id = $this->params('id');
 
		if( !isset($email_template_id) || $email_template_id == '' || $email_template_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Email Template Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->template_id) || $data->template_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Template ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->status) || $data->status == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Status should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_default) || $data->is_default == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Default should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->deleteemailTemplate($data,$email_template_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}	

public function SMSTemplateAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->template_id) || $data->template_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Template ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->status) || $data->status == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Status should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_default) || $data->is_default == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Default should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->addSMSTemplate($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}

public function updateSMSTemplateAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$SMS_template_id = $this->params('id');
 
		if( !isset($SMS_template_id) || $SMS_template_id == '' || $SMS_template_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'SMS Template Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->template_id) || $data->template_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Template ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->status) || $data->status == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Status should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_default) || $data->is_default == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Default should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->updateSMSTemplate($data,$SMS_template_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}	

public function deleteSMSTemplateAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$SMS_template_id = $this->params('id');
 
		if( !isset($SMS_template_id) || $SMS_template_id == '' || $SMS_template_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'SMS Template Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->template_id) || $data->template_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Template ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->status) || $data->status == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Status should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_default) || $data->is_default == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Default should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->deleteSMSTemplate($data,$SMS_template_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}	
	
public function savedResumesAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->user_id) || $data->user_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->resume_id) || $data->resume_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->addSavedResumes($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}

public function updatesavedResumesAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$saved_resumes_id = $this->params('id');
 
		if( !isset($saved_resumes_id) || $saved_resumes_id == '' || $saved_resumes_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Resumes Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->user_id) || $data->user_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->resume_id) || $data->resume_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->updatesavedResumes($data,$saved_resumes_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}	

public function deletesavedResumesAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$saved_resumes_id = $this->params('id');
 
		if( !isset($saved_resumes_id) || $saved_resumes_id == '' || $saved_resumes_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Resumes Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->user_id) || $data->user_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->resume_id) || $data->resume_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->deletesavedResumes($data,$saved_resumes_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}

	public function savedResumesSearchesAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->keyword) || $data->keyword == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Keyword should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->resume_posted_from) || $data->resume_posted_from == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume Posted From should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->resume_posted_to) || $data->resume_posted_to == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume Posted To should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->experience_from) || $data->experience_from == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Experience From should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->experience_to) || $data->experience_to == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Experience To should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->location) || $data->location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Location should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_desired_location) || $data->is_desired_location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Desired Location should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->addsavedResumesSearches($data);
			}
		}
			
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}

public function updatesavedResumesSearchesAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$saved_resumes_searches_id = $this->params('id');
 
		if( !isset($saved_resumes_searches_id) || $saved_resumes_searches_id == '' || $saved_resumes_searches_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Resumes Searches Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->keyword) || $data->keyword == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Keyword should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->resume_posted_from) || $data->resume_posted_from == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume Posted From should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->resume_posted_to) || $data->resume_posted_to == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume Posted To should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->experience_from) || $data->experience_from == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Experience From should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->experience_to) || $data->experience_to == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Experience To should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->location) || $data->location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Location should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_desired_location) || $data->is_desired_location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Desired Location should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->updatesavedResumesSearches($data,$saved_resumes_searches_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}	

public function deletesavedResumesSearchesAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$saved_resumes_id = $this->params('id');
 
		if( !isset($saved_resumes_id) || $saved_resumes_id == '' || $saved_resumes_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Resumes Id should not be empty or zero');
		  return new JsonModel($resp);
        }		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
        if( !isset($data->keyword) || $data->keyword == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Keyword should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->resume_posted_from) || $data->resume_posted_from == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume Posted From should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->resume_posted_to) || $data->resume_posted_to == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Resume Posted To should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->experience_from) || $data->experience_from == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Experience From should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->experience_to) || $data->experience_to == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Experience To should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->location) || $data->location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Location should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_desired_location) || $data->is_desired_location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Desired Location should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->deletesavedResumesSearches($data,$saved_resumes_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}
	
	public function changePasswordAction()
    {
		
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$emp_id = $this->params('id');
 
		if( !isset($emp_id) || $emp_id == '' || $emp_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty or zero');
		  return new JsonModel($resp);
        }
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->token) || $data->token== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Token should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
      
        
        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
              
			else{
			$sm = $this->getServiceLocator();
			$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
			$EmployerService = new EmployerService($dbAdapter);
			$resp = $EmployerService->changePasswordSelectService($data,$emp_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
   
	}
	
	
	
	public function updateemployerAccountsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		$employer_accounts_id = $this->params('id');
 
		if( !isset($employer_accounts_id) || $employer_accounts_id == '' || $employer_accounts_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer Accounts ID should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }

        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->role_type) || $data->role_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Role Type should not be empty');
          return new JsonModel($resp);
        }
		
        if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
       		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->updateemployerAccounts($data,$employer_accounts_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}
	
	
	public function employerAccountsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }

        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->role_type) || $data->role_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Role Type should not be empty');
          return new JsonModel($resp);
        }
		
        if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
       		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->addemployerAccounts($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}
	
		
	public function deleteemployerAccountsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		$employer_accounts_id = $this->params('id');
 
		if( !isset($employer_accounts_id) || $employer_accounts_id == '' || $employer_accounts_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer Accounts ID should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->employer_id) || $data->employer_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }

        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->role_type) || $data->role_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Role Type should not be empty');
          return new JsonModel($resp);
        }
		
        if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
       		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$EmployerService = new EmployerService($dbAdapter);
				$resp = $EmployerService->deleteemployerAccounts($data,$employer_accounts_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}
	


	
	
}