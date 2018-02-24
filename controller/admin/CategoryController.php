<?php 
require_once 'lib/page.php';
require_once 'controller/admin/AuthController.php';


class CategoryController extends Controller{



    public function index() {
    	
    	$auth = new AuthController();

        if (isset($_REQUEST['page'])) {

            $page = $_REQUEST['page'];

        } else {



            $page = 1;

        }

        $model = $this->getModel();

        $db = $model->getDb();

        $start = ($page - 1) * Application::$_config['page']['page_size'];

        $sql = 'select category_id,category_name,category_path,concat(category_path,"-",category_id) as path,is_show,sort_order,is_tuijian  from ' . $model->table('category') . " where is_delete = 0 " . " order by path,sort_order limit $start," . Application::$_config['page']['page_size'];

    

        

        $result = $db->query($sql);

        $i = 0;

        $a = null;

        $num_rows = mysql_num_rows($result);

        while ($rs = $db->fetch_assoc($result)) {

            $count = substr_count($rs['path'], '-');

            $data[$i]['category_name'] = str_repeat('|--&nbsp;&nbsp;', ($count - 1)) . $rs['category_name'];

            $data[$i]['is_show'] = $rs['is_show'] == 1 ? "<img class=\"is-show\" src='public/images/yes.gif'/>" : "<img  class=\"is-show\" src='/public/images/no.gif' />";

            $data[$i]['sort_order'] = $rs['sort_order'];

              $data[$i]['is_tuijian'] = $rs['is_tuijian'];

            $data[$i]['operate'] = "<a href=\"?p=admin&c=category&a=edit&id={$rs["category_id"]}\">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:void(0);\" data_id=\"{$rs["category_id"]}\" class=\"delete\">删除</a>";          

            if($count == 1){

                    if($a != null)

                        $first[] = $a;

                     $a = array();

                    array_push($a, $data[$i]);

                }else{

                    array_push($a, $data[$i]);

                }

                if($i == $num_rows-1)

                    $first[] = $a;

            $i++;

        }



        //排序   

        if($first){

            for($k=0; $k<count($first); $k++){

                for($z=0; $z<count($first[$k]); $z++){ 

                    if($z > 0){

                        for($y=$z+1; $y<count($first[$k]); $y++){ 

                           if($first[$k][$z]['sort_order'] > $first[$k][$y]['sort_order']){

                            $exchange = $first[$k][$z];

                            $first[$k][$z] = $first[$k][$y];

                            $first[$k][$y] = $exchange;

                           }

                        }

                    }

                }

            }

     

            

            

             for($k=0; $k<count($first); $k++){

                for($y=$k+1; $y<count($first); $y++){

                    if($first[$k][0]['sort_order'] > $first[$y][0]['sort_order']){

                        $exchange = $first[$k];

                        $first[$k] = $first[$y];

                        $first[$y] = $exchange;

                    }

                }

             }

        } 

        $page = new Page($this->get_category_count(), Application::$_config['page']['page_size']);

        $this->setValue('data', $first);

        $this->setValue('page', $page->showpage());

        parent::display();

    }



    public function add() {

        $this->setValue('data', $this->get_category_list());

        parent::add();

    }



    public function save() {



        if (isset($_REQUEST['category_name']) && trim($_REQUEST['category_name']) != '')

            $category_name = $_REQUEST['category_name'];

        else {

            echo '请输入分类名称';

            return;

        }



        if (isset($_REQUEST['category_pid']))

            $category_pid = intval($_REQUEST['category_pid']);



        if (isset($_REQUEST['is_show']))

            $is_show = intval($_REQUEST['is_show']);

        

        if (isset($_REQUEST['is_tuijian']))

            $is_tuijian = intval($_REQUEST['is_tuijian']);



        if (isset($_REQUEST['sort_order']) && trim($_REQUEST['sort_order']) != '')

            $sort_order = intval($_REQUEST['sort_order']);

        else

            $sort_order = 0;

        if (isset($_REQUEST['cover_path']))

            $cover_path = $_REQUEST['cover_path'];





        if (isset($_REQUEST['category_id']) && trim($_REQUEST['category_id']) != '') {

            $category_id = $_REQUEST['category_id'];

        } else {

            $category_id = -1;

        }

        $model = $this->getModel();

        $db = $model->getDb();





        if ($category_pid != 0) {

            $sql = 'select category_path from ' . $model->table('category') . ' where category_id = ' . $category_pid;

            $result = $db->query($sql);

            if ($result) {

                $data = $db->fetch_assoc($result);

            }

            $category_path = $data['category_path'] . '-' . $category_pid;

        } else {

            $category_path = $category_pid;

        }

        $is_delete = 0;

        $result = 0;

        if ($category_id != -1) {

            $_POST['category_path'] = $category_path;

            if ($db->update_by_post_param($model->table('category'), 'category_name,category_pid,category_path,sort_order,is_show,cover_path,is_tuijian', $_POST, "category_id=$category_id")) {

                $result = 'ok';

            } else {

                $result = 'error';

            }

        } else {

            if ($db->insert($model->table('category'), '', "-1,'$category_name',$category_pid,'$category_path',$is_show,$sort_order,'$cover_path',$is_delete,$is_tuijian"))

                $result = 'ok';

            else

                $result = 'error';

        }

        echo $result;

    }



    public function get_category_list($id = -1) {

        $model = $this->getModel();

        $db = $model->getDb();

        $sql = 'select category_id,category_pid,category_name,concat(category_path,"-",category_id) as path  from ' . $model->table('category') . ' where is_delete = 0 order by path';

        $result = $db->query($sql);

        $i = 0;

        while ($rs = $db->fetch_assoc($result)) {

            $count = substr_count($rs['path'], '-');

            $data[$i] = "<option value='$rs[category_id]'";

            if ($rs[category_id] == $id)

                $data[$i] .= ' selected ';

            $data[$i] .= ">" . str_repeat('|--&nbsp;&nbsp;', ($count - 1)) . $rs['category_name'] . "</option>";

            $i++;

        }

        return $data;

    }



    private function get_category_count() {

        $model = $this->getModel();

        $db = $this->getDb();

        return $db->get_count($model->table('category'), 'category_id', '');

    }



    public function delete() {

        $model = $this->getModel();

        $db = $this->getDb();

        $_POST['is_delete'] = 1;

        $category_id = $_POST['category_id'];

        $result = $db->update_by_post_param($model->table('category'), 'is_delete', $_POST, "category_id=$category_id or category_path like '%$category_id%'");

        if ($result)

            echo 'ok';

        else {

            echo 'error';

        }

    }



    public function is_show() {

        $model = $this->getModel();

        $db = $this->getDb();

        $category_id = $_POST['category_id'];

        $result = $db->update_by_post_param($model->table('category'), 'is_show', $_POST, "category_id=$category_id or category_path like '%$category_id%'");

        if ($result)

            echo 'ok';

        else {

            echo 'error';

        }

    }



    public function edit() {

        $model = $this->getModel();

        $db = $this->getDb();

        $category_id = $_REQUEST['id'];

        $result = $db->select($model->table('category'), '*', "category_id=$category_id");

        $data = $db->get_one_object($result);

        $this->setValue('data', $data);

        $this->setValue('category', $this->get_category_list($data['category_pid']));

        $this->setValue('category_pid', $data['category_pid']);

        $this->display();

    }



}

