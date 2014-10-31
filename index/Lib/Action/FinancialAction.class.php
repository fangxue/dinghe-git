<?php
class FinancialAction extends BaseAction {
	
	public function index()
	{
		$financialModel = M("financial");
		$list = $financialModel->order("create_time DESC")->select();
		$this->assign("list",$list);
		$this->assign("title","金融课堂");
        $this->display();
	}

	public function detail()
	{
		$id =  $this->getParam("get","id");
		if(!$id){
			$this->error("参数错误");
		}
		$financialModel = M("financial");

		$list = $financialModel->where(array("id"=>$id))->order("create_time desc")->find();

		$this->assign("list",$list);
		$this->assign("title","金融课堂");
		$this->display("Public/detail");
	}
}
	
	
?>
