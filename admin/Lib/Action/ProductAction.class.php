<?php
//产品中心
class ProductAction extends BaseAction {
	
	public function index(){
		$productModel = M("product");

		$info = $productModel->field("class,content")->select();
		$arr = array();
		foreach ($info as $key => $value) {
			$arr[$value['class']] = $value["content"];
		}
		$this->assign("list",$arr);
		$this->display();
	}

	public function add(){
		$productModel = M("product");
		$data = $this->getParam('post');

		$info["content"] = trim($data["content"]);
		$info["update_time"] = time();

		$res = $productModel->where(array("class"=>$data["id"]))->find();
		if(empty($res)){
			$info["class"] = $data["id"];
			$productModel->add($info);
		}else{
			$productModel->where(array("class"=>$data['id']))->save($info);
		}
		echo json_encode(array('str' =>$info["content"]));exit; 
	}

	
}
	
	
?>
