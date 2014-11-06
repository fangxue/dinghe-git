<?php
class PublicAction extends BaseAction {
    public function login() {
        if(!$this->getParam('session','admin_user_id')) {
            $this->assign('title',"Email");
            $this->display();
        }else{
            $this->redirect('/admin.php/PartnerLogo/index');
        }
    }

    public function logout() {
        if($this->getParam('session','admin_user_id')){
            session('admin_user_id',null); // 删除admin_user_id
            session('admin_user_info',null); // 删除admin_user_info

            $this->redirect('/admin.php/Public/login');
        }else {
            $this->error('已经登出！');
        }
    }

    public function checkLogin() {
    	
        $name = $this->getParam('post','name');
        $name = trim($name);
        $password = $this->getParam('post','password');

        if(empty($name)) {
            $this->error('帐号不能为空');
        }elseif (empty($password)){
            $this->error('密码不能为空');
        }
        
        $map = array();
        $map['name'] = $name;
        
        $authInfo = M('adminUser')->where($map)->find();

        if($authInfo) {
            //密码错误
            if($authInfo['password'] != md5($password)) {
                $this->error('帐号或密码错误','/admin.php/Public/login');
            }
            
            session('admin_user_id',$authInfo['id']);  //设置session
            session('admin_user_info',$authInfo);  //设置session

            $data["last_date"] = time();
            $data["update_time"] = time();
            M("adminUser")->where('id='.$authInfo['id'])->save($data);

          
            $this->success('登录成功！','/admin.php/PartnerLogo/index');
           
        }else {
            $this->error('帐号或密码错误');
        }
    }

    public function checkPassword() {
        $uid = $this->getParam('post','uid');
        $pass1 = $this->getParam('post','pass1');
        $pass2 = $this->getParam('post','pass2');

        $user_info = M("adminUser")->where(array("id"=>$uid))->find();
        if($user_info['password'] != md5($pass1)){
            echo json_encode(array('result' =>1,'msg'=>'旧密码不正确'));exit;
        }
        if(!preg_match("/^[a-zA-Z\d_]{8,15}$/",$pass2)){
            echo json_encode(array('result' =>1,'msg'=>'密码不能少于8位，不能多于15位'));exit;
        }else{
            echo json_encode(array('result' =>2));exit;
        }

    }

    public function user() {
        $list = M("adminUser")->select();
        $this->assign('list',$list);
        $this->display();
    }


    public function register() {
        $list = M("user")->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function del()
    {
        $id =  $this->getParam("get","id");
        if(empty($id)){
            $this->error("参数错误");
        }
        $adminUserModel = M("adminUser");
        $info = $adminUserModel->where(array("id"=>$id))->find();
        if(empty($info)){
            $this->error("此条记录不存在，或已被删除","/admin.php/Public/index");
        }
        $res = $adminUserModel->where(array("id"=>$id))->delete();
        if(is_numeric($res)){
            $this->success("成功删除");
        }
    }
    
}