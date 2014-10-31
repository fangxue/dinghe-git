<?php
//走进鼎赫
class DingheAction extends BaseAction {
    public function index(){
    	$imageModel = M("image");
    	$list = $imageModel->order("create_time desc")->select();
    	$this->assign("list",$list);
        $this->display();
    }

    public function uploadImage(){

		$files = $_FILES["Filedata"];
		if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
			$res = $this->_upload($files,"/wwwroot/Uploads/dinghe/",'/Uploads/dinghe/');
			$imageModel = M("image");
			$info["path"] = $res;
			$info["create_time"] = time();
			$id = $imageModel->add($info);
			echo json_encode(array("str"=>$res,"id"=>$id));die;
		}
	}

	public function del()
	{
		$id =  $this->getParam("get","id");
		if(empty($id)){
			$this->error("参数错误");
		}
		$imageModel = M("image");
		$info = $imageModel->where(array("id"=>$id))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/Dinghe/index");
		}
		$res = $imageModel->where(array("id"=>$id))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}

	public function add(){
		$aboutModel = M("about");
		if($this->getParam('post')){
			$data = $this->getParam('post');
			$info["title"] = trim($data["title"]);
			$info["content"] = stripslashes($data['content']);
			$info["update_time"] = time();
			$info["class"] = $data["classid"];

			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $aboutModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/Dinghe/index');
				}
			}else{
				$result = $aboutModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/Dinghe/index');
				}
			}
			
		}else{
			$id = $this->getParam('get','id');
			$list = $aboutModel->where(array("class"=>$id))->find();
			$dinghe = C("CLASS_DINGHE");
			$this->assign("title",$dinghe[$id]);
			$this->assign("list",$list);
			$this->assign("id",$id);
			$this->display();
		}
	}
}