<?php
class FinancialAction extends BaseAction {
	
	public function index()
	{
		$articleModel = M("article");
		$list = $articleModel->where(array("class"=>"金融课堂"))->order("create_time DESC")->select();
		$this->assign("list",$list);
		$this->assign("title","金融课堂");
        $this->display();
	}
}
	
	
?>
