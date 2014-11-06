<?php
//风控体系
class FengkongAction extends BaseAction {
	
	public function index(){
		$newsModel = M("news");

		$info = $newsModel->where(array("class"=>"风控体系"))->find();

		$this->assign("list",$info);
		$this->display();
	}

	public function add(){
		$newsModel = M("news");
		$data = $this->getParam('post');
		$content = str_replace('<p><br/></p>','',stripslashes($data["content"])); 
		
		$info["content"] = $content;
		$info["update_time"] = time();
		$res = $newsModel->where(array("class"=>"风控体系"))->find();
		if(empty($res)){
			$info["title"] = "风控体系";
			$info["class"] = "风控体系";
			$info["img"] = "";
			$info["create_time"] = time();
			$newsModel->add($info);
		}else{
			$newsModel->where(array("class"=>"风控体系"))->save($info);
		}
		echo json_encode(array('str' =>$info["content"]));exit; 
	}

	public function uploadImage(){
		$newsModel = M("news");

		$files = $_FILES["Filedata"];
		if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
			$res = $this->_upload($files,"/public/Uploads/fengkong/",'/fengkong/');

			$result = $newsModel->where(array("class"=>"风控体系"))->find();
			$info["img"] = $res;
			$info["update_time"] = time();
			if(empty($result)){
				$info["title"] = "风控体系";
				$info["class"] = "风控体系";
				$info["content"] = "";
				$info["create_time"] = time();
				$newsModel->add($info);
			}else{
				$newsModel->where(array("class"=>"风控体系"))->save($info);
			}
			echo json_encode(array('str' =>$res));exit; 
		}
	}

	
}
	
	
?>
