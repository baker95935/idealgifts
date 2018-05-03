<?php
require_once 'lib/page.php';
require_once 'controller/admin/AuthController.php';

class OrderController extends Controller {



    public function index() {

        $data=array();
        $data['order_number']=$_REQUEST['order_number'];
   		!empty($data['order_number']) && $this->setValue('order_number', $data['order_number']);
        
        
    	$auth = new AuthController();

        if (isset($_REQUEST['page'])) {

            $page = $_REQUEST['page'];

        } else {
            $page = 1;

        }
 


       $this->get_all_orders($page,$data);

       $this->display();

    }



 



    public function edit() {

        $id = $_REQUEST['id'];
 

        $this->setValue('id', $id);
        $this->setValue('data', $this->get_order_by_id($id));
        
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('orders'), '*', "order_number = '".$id."'   limit 0,5");
  		$adata = null;
     
    	while ($rs = $db->fetch_assoc($result)) {
    	
    		$adata[] = $rs;
    	
    	}
    	$this->setValue('adata', $adata);
        

        $this->display();

    }



    public function insert_or_update() {

        $model = $this->getModel();

        $db = $model->getDb();

        $_POST['order_price'];
		$_POST['express_name'];
		$_POST['express_number'];
		$_POST['status']=2;
		$_POST['send_time']=time();
        $column = 'order_price,express_name,express_number,status,send_time';

 
        if (isset($_POST['order_number'])) {

            $order_number = $_POST['order_number'];
            if ($db->update_by_post_param($model->table('orders'), $column, $_POST, "order_number = $order_number")) {

                echo 'ok';

            }   
        }  else {
         	echo '操作失败，请联系相关技术人员';
        }

            

            

    }



    public function update() {

        $controller = new GalleryController();

        $controller->delete_by_good_id($_POST['$id']);

    }



    private function get_all_orders($page,$data) {

        $model = $this->getModel();

        $db = $model->getDb();
 
        $start = ($page - 1) * Application::$_config['page']['page_size'];
        
        $sql = "select * from {$model->table('orders')} ";
        
        if(!empty($data))
        {
        	!empty($data['order_number']) && $sql.=" where order_number like '%".$data['order_number']."%'";
         
        }
		 
		$sql.="group by order_number order by id desc limit $start," . Application::$_config['page']['page_size'];
 

 
        $result = $db->query($sql);

        $i = 0;

        while ($rs = $db->fetch_assoc($result)) {

            $data[$i]['id'] = $rs['id'];

            $data[$i]['order_number'] = $rs['order_number'];
            
            if($rs['status']==1){
            	$status='订单提交';
            } else if($rs['status']==2) {
            	$status='订单已发货';
            } else if($rs['status']==3){
            	$status='订单完成';
            } else {
            	$status='订单未知状态';
            }
            
            $data[$i]['status'] = $status;


            $data[$i]['order_price'] = $rs['order_price'];

            $data[$i]['ctime'] = date('Y-m-d H:i:s',$rs['ctime']);

            $data[$i]['op'] = '<a href="?p=admin&c=Order&a=edit&id=' . $rs['order_number'] . '">发货</a>&nbsp;&nbsp;<a class="'.'delete" data_id="'.$rs["order_number"].'" href="javascript:void(0);">删除</a>';

            $i++;

        }
       
        //获取总数
        $countt=$this->get_orders_count($data);
 
        //获取分页数
        $pageCount=ceil($countt/Application::$_config['page']['page_size']);
 
        $page = new Page($countt, Application::$_config['page']['page_size']);
 
        $this->setValue('data', $data);
        
        $this->setValue('pageCount', $pageCount);

        $this->setValue('page', $page->showpage());
 

    }



    private function get_orders_count($data=array()) 
    {

        $model = $this->getModel();

        $db = $this->getDb();
        
        $condition='';
        !empty($data['order_number']) && $condition=" order_number like '%".$data['order_number']."%'";

        return $db->get_count($model->table('orders'), 'order_number', $condition);

    }



    private function get_order_by_id($id) {

        $model = $this->getModel();

        $db = $this->getDb();

        $result = $db->select($model->table('orders'), '*', "order_number ='". $id."'");

        return $db->get_one_object($result);

    }



    public function delete() 
    {

        $order_number = $_POST['order_number'];

        $model = $this->getModel();

        $db = $this->getDb();

        if($db->delete($model->table('orders'),"order_number = '".$order_number."'") ){

            echo 'ok';

        }else{

            echo 'error';

        }

    }
    
 



}

