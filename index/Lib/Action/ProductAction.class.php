<?php
class ProductAction extends BaseAction {
	
	public function index()
	{
		$productModel = M("product");

		$info = $productModel->field("class,content")->select();
		$arr = array();
		foreach ($info as $key => $value) {
			$arr[$value['class']] = $value["content"];
		}
		$this->assign("list",$arr);
		$this->assign("title","产品中心");
        $this->display();
	}
}
	
	
?>
