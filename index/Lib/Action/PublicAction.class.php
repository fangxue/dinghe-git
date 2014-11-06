<?php
class PublicAction extends BaseAction {

    public function login() {
            $this->assign('title',"登录");
            $this->display();
    }

     public function register() {
        $userModel = M("user");

        if($this->getParam('post')){
            $data = $this->getParam('post');

            $info["name"] = trim($data["userName"]);
            $info["password"] = md5($data["password"]);
            $info["email"] = trim($data["email"]);
            $info["create_time"] = time();
            $info["last_date"] = time();
            

            $result = $userModel->add($info);
            if(is_numeric($result)){
                $this->display("public/login");
            }
        }else{
            $this->assign('title',"注册");
            $this->display();
        }

    }

    public function logout() {
        if($this->getParam('session','user_id')){
        	session('user_id',null); // 删除user_id
        	session('user_info',null); // 删除user_info
    
            $this->redirect('/');
        }else {
            $this->error('已经登出！');
        }
    }

    public function checkLogin() {
    	$userModel = M("user");
    	$name = $this->getParam('post','userName');
    	$name = trim($name);
    	$password = $this->getParam('post','password');

        $map = array();
        $map['name'] = $name;
        
        $authInfo = $userModel->where($map)->find();
        if($authInfo){
        	//密码错误
            if($authInfo['password'] !== md5($password)) {
        		$this->error('帐号或密码错误','/Public/login');
            }
            
            session('user_id',$authInfo['id']);  //设置session
            session('user_info',$authInfo);  //设置session

            $data["last_date"] = time();
            $userModel->where(array("id"=>$authInfo['id']))->save($data);
            $this->redirect('/');
        }else {
        	$this->error('帐号或密码错误');
        }
    }

    public function checkName() {
    	$name = $this->getParam('post','username');
        $user = M("adminUser")->where(array("name"=>$name))->find();

        if($user){
            echo json_encode(array('result' =>1));exit;
        }else{
            echo json_encode(array('result' =>0));exit;
        }
    }

    //验证码
    public function getVerify(){
        $this->_verify(8,1,'png',40,40);
    }

    private function _verify($length=4, $mode=1, $type='png', $width=48, $height=22, $verifyName='verify'){
        import('ORG.Util.Image');
        Image::buildImageVerify($length,$mode,$type,$width,$height,$verifyName);
    }


    
}