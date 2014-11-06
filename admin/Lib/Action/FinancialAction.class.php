<?php
//金融课堂
class FinancialAction extends BaseAction {
	
	public function index(){
		$financialModel = M("financial");

		$count = $financialModel->order("create_time DESC")->count();
		$page = new Page($count,5);

		$list = $financialModel->order("create_time DESC")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("list",$list);
		$this->displayPage($page);
		$this->display();
	}

	public function addNews(){
		$financialModel = M("financial");
		if($this->getParam('post')){
			$data = $this->getParam('post');
	
			$info["title"] = trim($data["title"]);
			$info["content"] = stripslashes($data['content']);;
			
			$info["update_time"] = time();

			$files = $_FILES["Filedata"];
			if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
				$res = $this->_upload($files,"/public/Uploads/financial/",'/financial/');
				$info["img"] = $res;
			}
			
			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $financialModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/Financial/index');
				}
			}else{
				$result = $financialModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/Financial/index');
				}
			}
			
		}else{
			$id = $this->getParam('get','id');
			$list = $financialModel->where(array("id"=>$id))->find();
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
		$financialModel = M("financial");
		$info = $financialModel->where(array("id"=>$id))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/admin.php/Financial/index");
		}
		$res = $financialModel->where(array("id"=>$id))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}
	
}
	
	
?>
