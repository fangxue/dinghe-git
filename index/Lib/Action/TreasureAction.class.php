<?php
class TreasureAction extends BaseAction {
	
	public function index()
	{
		$id = $this->getParam("get","id");
		$classNameModel = M("className");
		$articleModel = M("article");
		$leftlist = $classNameModel->where(array("pid"=>3))->order("create_time desc")->select();
		
		if($id){
			$classname = $classNameModel->where(array("id"=>$id))->getField("name");
			$this->assign("id",$id);
		}else{
			$class = $classNameModel->where(array("pid"=>3))->order("create_time desc")->limit(1)->find();
			$this->assign("id",$class["id"]);
			$classname = $class["name"];
		}
		
		$count = $articleModel->where(array("class"=>$classname))->count();
		$page = new Page($count,10);
		$articleInfo = $articleModel->where(array("class"=>$classname))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->assign("list",$articleInfo);
		
		$this->assign("classname",$classname);
		$this->assign("leftlist",$leftlist);
		$this->assign("left_link","/commerce/index/");
		$this->assign("list_link","/commerce/detail/");
		$this->assign("title","财富中心");
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
		$this->assign("title","财富中心");
		$this->display("Public/detail");
	}
}
	
	
?>
