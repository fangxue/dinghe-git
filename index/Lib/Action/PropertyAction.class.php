<?php
class PropertyAction extends BaseAction {
	
	public function index()
	{
		$id = $this->getParam("get","id");
		$classNameModel = M("className");
		$articleModel = M("article");
		$leftlist = $classNameModel->where(array("pid"=>2))->order("sort desc")->select();
		
		if($id){
			$classname = $classNameModel->where(array("id"=>$id))->find();
			$this->assign("id",$id);
		}else{
			$classname = $classNameModel->where(array("pid"=>2))->order("sort desc")->limit(1)->find();
			$id = $classname["id"];
			$this->assign("id",$classname["id"]);
		}

		$count = $articleModel->where(array("class"=>$id))->count();
		$page = new Page($count,10);
		$articleInfo = $articleModel->where(array("class"=>$id))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		

		$this->assign("list",$articleInfo);
		
		$this->assign("classname",$classname);
		$this->assign("leftlist",$leftlist);
		$this->assign("left_link","/property/index/");
		$this->assign("list_link","/property/detail/");
		$this->assign("title","资产管理");
		$this->displayPage($page);
        $this->display("Public/lists");
	}

	public function detail()
	{
		$id =  $this->getParam("get","id");
		if(!$id){
			$this->error("参数错误");
		}
		$articleModel = M("article");

		$list = $articleModel->where(array("id"=>$id))->find();

		$this->assign("list",$list);
		$this->assign("title","资产管理");
		$this->display("Public/detail");
	}
}
	
	
?>
