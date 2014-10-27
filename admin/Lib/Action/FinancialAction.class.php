<?php
//金融课堂
class FinancialAction extends BaseAction {
	
	public function index(){
		$articleModel = M("article");
		$list = $articleModel->where(array("class"=>"金融课堂"))->order("create_time DESC")->select();
		$this->assign("list",$list);
		$this->display();
	}

	public function addNews(){
		$articleModel = M("article");
		if($this->getParam('post')){
			$data = $this->getParam('post');
	
			$info["title"] = trim($data["title"]);
			$info["content"] = stripslashes($data['content']);;
			$info["class"] = '金融课堂';
			
			$info["update_time"] = time();

			$files = $_FILES["Filedata"];
			if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
				$res = $this->_upload($files,"/wwwroot/Uploads/financial/",'/Uploads/financial/');
				$info["img"] = $res;
			}
			
			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $articleModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/Financial/index');
				}
			}else{
				$result = $articleModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/Financial/index');
				}
			}
			
		}else{
			$id = $this->getParam('get','id');
			$list = $articleModel->where(array("id"=>$id))->find();
			$this->assign("list",$list);
			$this->assign("id",$id);
			$this->display();
		}
	}

	public function del()
	{
		$id =  $this->getParam("get","id");
		if(empty($id)){
			$this->error("参数错误");
		}
		$articleModel = M("article");
		$info = $articleModel->where(array("id"=>$id))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/Financial/index");
		}
		$res = $articleModel->where(array("id"=>$id))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}
	
}
	
	
?>
