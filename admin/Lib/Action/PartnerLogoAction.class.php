<?php
//合作伙伴Logo
class PartnerLogoAction extends BaseAction {
    public function index(){
    	$logoModel = M("logo");
    	$list = $logoModel->order("create_time desc")->select();
    	$this->assign("list",$list);
        $this->display();
    }

    public function uploadImage(){

		$files = $_FILES["Filedata"];
		if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
			$res = $this->_upload($files,"/public/Uploads/logo/",'/logo/');
			$logoModel = M("logo");
			$info["path"] = $res;
			$info["create_time"] = time();
			$id = $logoModel->add($info);

			echo json_encode(array("str"=>$res,"id"=>$id));die;
		}
	}

	public function del()
	{
		$id =  $this->getParam("get","id");
		if(empty($id)){
			$this->error("参数错误");
		}
		$logoModel = M("logo");
		$info = $logoModel->where(array("id"=>$id))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/admin.php/PartnerLogo/index");
		}
		$res = $logoModel->where(array("id"=>$id))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}
}