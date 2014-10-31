<?php
class FengkongAction extends BaseAction {
	
	public function index()
	{
		$newsModel = M("news");

		$info = $newsModel->where(array("class"=>"风控体系"))->find();

		$this->assign("list",$info);
		$this->assign("title","风控体系");
        $this->display();
	}

	public function detail()
	{
		$id =  $this->getParam("get","id");
		if(!$id){
			$this->error("参数错误");
		}
		$newsModel = M("news");

		$list = $newsModel->where(array("id"=>$id))->find();

		$this->assign("list",$list);
		$this->assign("title","风控体系");
		$this->display("Public/detail");
	}
}
	
	
?>
