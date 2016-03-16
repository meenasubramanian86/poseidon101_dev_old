<?php
//Products
namespace Products\Controller;

use Zend\Validator\AbstractValidator;
use Zend\Mvc\Controller\AbstractRestfulController;

use Zend\View\Model\JsonModel;

use Zend\Http\Response;
use Products\Service\ProductsService;

use Zend\Http\Client as HttpClient;



class ProductsController extends AbstractRestfulController
{
	
public function addProductsAction()
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
		 if( !isset($data->product_id) || $data->product_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Product ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->invoice_id) || $data->invoice_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'InvoiceID should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->activation_date) || $data->activation_date == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Activation Date should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->employer_id) || $data->employer_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Employer ID should not be empty');
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
				$ProductsService = new ProductsService($dbAdapter);
				$resp = $ProductsService->addProductsAction($data);
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
	
public function updateProductsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$product_id = $this->params('id');
 
		if( !isset($product_id) || $product_id == '' || $product_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Product Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->product_id) || $data->product_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Product ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->invoice_id) || $data->invoice_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'InvoiceID should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->activation_date) || $data->activation_date == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Activation Date should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->employer_id) || $data->employer_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Employer ID should not be empty');
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
				$ProductsService = new ProductsService($dbAdapter);
				$resp = $ProductsService->updateProductsAction($data,$product_id);
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
	
	public function deleteProductsAction()
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
			
		 
        $product_id = $this->params('id');
 
		if( !isset($product_id) || $product_id == '' || $product_id	 == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		
if( !isset($data->product_id) || $data->product_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Product ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->invoice_id) || $data->invoice_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'InvoiceID should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->activation_date) || $data->activation_date == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Activation Date should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->employer_id) || $data->employer_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Employer ID should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->modified_by) || $data->modified_by == '') {
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
				$ProductsService = new ProductsService($dbAdapter);
				$resp = $ProductsService->deleteProducts($data,$product_id);
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
	
public function addBannersAction()
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
		 if( !isset($data->title) || $data->title== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Title should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->description) || $data->description == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Description should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->banner_group) || $data->banner_group == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Banner Group should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->display_time) || $data->display_time == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Display Time should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->price) || $data->price == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Price should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->redirect_link) || $data->redirect_link == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Redirect Link should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->banner_file_path) || $data->banner_file_path == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Banner File Path should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->activation_start_date) || $data->activation_start_date== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Activation Start Date should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_name) || $data->contact_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Name should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_email_id) || $data->contact_email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Email ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_number) || $data->contact_number== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Number should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->created_by) || $data->created_by== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_active) || $data->is_active== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$ProductsService = new ProductsService($dbAdapter);
				$resp = $ProductsService->addBannersAction($data);
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
	
public function updateBannersAction()
    {
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$banner_id = $this->params('id');
 
		if( !isset($banner_id) || $banner_id == '' || $banner_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Product Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->title) || $data->title== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Title should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->description) || $data->description == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Description should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->banner_group) || $data->banner_group == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Banner Group should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->display_time) || $data->display_time == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Display Time should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->price) || $data->price == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Price should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->redirect_link) || $data->redirect_link == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Redirect Link should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->banner_file_path) || $data->banner_file_path == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Banner File Path should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->activation_start_date) || $data->activation_start_date== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Activation Start Date should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_name) || $data->contact_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Name should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_email_id) || $data->contact_email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Email ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_number) || $data->contact_number== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Number should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_active) || $data->is_active== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
		else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$ProductsService = new ProductsService($dbAdapter);
				$resp = $ProductsService->updateBannersAction($data,$banner_id);
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
	
	public function deleteBannersAction()
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
			
		 
        $banner_id = $this->params('id');
 
		if( !isset($banner_id) || $banner_id == '' || $banner_id	 == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Employer Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		
if( !isset($data->title) || $data->title== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Title should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->description) || $data->description == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Description should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->banner_group) || $data->banner_group == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Banner Group should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->display_time) || $data->display_time == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Display Time should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->price) || $data->price == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Price should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->redirect_link) || $data->redirect_link == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Redirect Link should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->banner_file_path) || $data->banner_file_path == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Banner File Path should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->activation_start_date) || $data->activation_start_date== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Activation Start Date should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_name) || $data->contact_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Name should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_email_id) || $data->contact_email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Email ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->contact_number) || $data->contact_number== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Contact Number should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->modified_by) || $data->modified_by== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_active) || $data->is_active== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }		
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$ProductsService = new ProductsService($dbAdapter);
				$resp = $ProductsService->deleteBannersAction($data,$banner_id);
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