<?php
class IndexAction extends BaseAction {
	
	public function index()
	{
		$logoModel = M("logo");
    	$list = $logoModel->select();
    	$this->assign("list",$list);

		$articleModel = M("article");
		$property = $articleModel->where(array("class"=>"资产管理"))->find();
		$commerce = $articleModel->where(array("class"=>"商业保理"))->find();
		$treasure = $articleModel->where(array("class"=>"财富中心"))->find();

		$this->assign("property",$property["content"]);
		$this->assign("commerce",$commerce["content"]);
		$this->assign("treasure",$treasure["content"]);

		$this->assign("title","鼎赫");
        $this->display();
	}
}
	
	
?>
