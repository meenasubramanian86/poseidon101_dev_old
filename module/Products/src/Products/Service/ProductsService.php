<?php
namespace Products\Service;
use Zend\View\Model\ViewModel;
use Products\Model\ProductsTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;
use Zend\Validator\Db\RecordExists;

use Zend\Cache\StorageFactory;
class ProductsService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }
    
  	public function addProductsAction($data)
    {
		
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['product_id'] = $data->product_id;
		$setdata['invoice_id'] = $data->invoice_id;
		$setdata['activation_date'] = $data->activation_date;
		$setdata['employer_id'] = $data->employer_id;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$ProductsTable = new ProductsTable($this->adapter);
		$res = $ProductsTable->addProductsAction($setdata);
		 
        return $res;
    }

	public function updateProductsAction($data,$product_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['product_id'] = $data->product_id;
		$setdata['invoice_id'] = $data->invoice_id;
		$setdata['activation_date'] = $data->activation_date;
		$setdata['employer_id'] = $data->employer_id;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $product_id;
		 
		
		$productsTable = new productsTable($this->adapter);
		$res = $productsTable->updateproductsAction($setdata,$where);
		 
        return $res;
    }
	public function deleteProducts($data,$product_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['product_id'] = $data->product_id;
		$setdata['invoice_id'] = $data->invoice_id;
		$setdata['activation_date'] = $data->activation_date;
		$setdata['employer_id'] = $data->employer_id;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $product_id;
				
		$productsTable = new productsTable($this->adapter);
		$res = $productsTable->deleteproductsAction($setdata,$where);
			 
        return $res;
    }
	
	public function addBannersAction($data)
    {
		
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['title'] = $data->title;
		$setdata['description'] = $data->description;
		$setdata['banner_group'] = $data->banner_group;
		$setdata['display_time'] = $data->display_time;
		$setdata['price'] = $data->price;
		$setdata['redirect_link'] = $data->redirect_link;
		$setdata['banner_file_path'] = $data->banner_file_path;
		$setdata['activation_start_date'] = $data->activation_start_date;
		$setdata['contact_name'] = $data->contact_name;
		$setdata['contact_email_id'] = $data->contact_email_id;
		$setdata['contact_number'] = $data->contact_number;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$ProductsTable = new ProductsTable($this->adapter);
		$res = $ProductsTable->addBannersAction($setdata);
		 
        return $res;
    }

	public function updateBannersAction($data,$banner_id)
    {
		
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['title'] = $data->title;
		$setdata['description'] = $data->description;
		$setdata['banner_group'] = $data->banner_group;
		$setdata['display_time'] = $data->display_time;
		$setdata['price'] = $data->price;
		$setdata['redirect_link'] = $data->redirect_link;
		$setdata['banner_file_path'] = $data->banner_file_path;
		$setdata['activation_start_date'] = $data->activation_start_date;
		$setdata['contact_name'] = $data->contact_name;
		$setdata['contact_email_id'] = $data->contact_email_id;
		$setdata['contact_number'] = $data->contact_number;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $banner_id;
		 
		
		$productsTable = new productsTable($this->adapter);
		$res = $productsTable->updateBannersAction($setdata,$where);
		 
        return $res;
    }
	public function deleteBannersAction($data,$banner_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['title'] = $data->title;
		$setdata['description'] = $data->description;
		$setdata['banner_group'] = $data->banner_group;
		$setdata['display_time'] = $data->display_time;
		$setdata['price'] = $data->price;
		$setdata['redirect_link'] = $data->redirect_link;
		$setdata['banner_file_path'] = $data->banner_file_path;
		$setdata['activation_start_date'] = $data->activation_start_date;
		$setdata['contact_name'] = $data->contact_name;
		$setdata['contact_email_id'] = $data->contact_email_id;
		$setdata['contact_number'] = $data->contact_number;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $banner_id;
				
		$productsTable = new productsTable($this->adapter);
		$res = $productsTable->deleteBannersAction($setdata,$where);
			 
        return $res;
    }
	
	
	
}
