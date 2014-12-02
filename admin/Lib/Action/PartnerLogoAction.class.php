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
		$filesGrey = $_FILES["FiledataGrey"];

			// print_r($_FILES);
			// print_r($filesGrey);die;

		// if(!$_FILES['Filedata']){
		// 	echo json_encode(array("result"=>false,"str"=>"请选择图片"));die;
		// }else if(!$_FILES['FiledataGrey']){
		// 	echo json_encode(array("result"=>false,"str"=>"请选择图片"));die;
		// }else{

			foreach ($_FILES as $key=>$file){
			    if(!empty($file['name'])) {
				        $upload->autoSub = true;
				        $upload->subType   =  'date';
				        // if($key == "Filedata"){
				        	$res = $this->_upload($_FILES[$key],"/public/Uploads/logo/",'/logo/',$key);
				        	print_r($res);
				        // }else{
				        // 	$resGrey = $this->_upload($_FILES[$key],"/public/Uploads/logo/",'/logo/',"grey");
				        // 	print_r($resGrey);
				        // }
			   		}
			    }

			// $res = $this->_upload($files,"/public/Uploads/logo/",'/logo/');
			// $resGrey = $this->_upload($filesGrey,"/public/Uploads/logo/",'/logo/',"grey");
			// var_dump($res);
			// var_dump($resGrey);
			die;
			$logoModel = M("logo");
			$info["path"] = $res;
			$info["grey_path"] = $resGrey;
			$info["create_time"] = time();
			$id = $logoModel->add($info);

			echo json_encode(array("result"=>true,"str"=>$res,"id"=>$id,"grey_path"=>$resGrey));die;
		// }

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