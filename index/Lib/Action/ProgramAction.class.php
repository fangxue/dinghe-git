<?php
class ProgramAction extends BaseAction {
	
	public function index()
	{
		$classNameModel = M("className");
		$list = $classNameModel->where(array("pid"=>4))->order("sort desc")->select();
		$this->assign("list",$list);
		$this->assign("title","解决方案");
		$this->display();
	}

	public function lists(){
		$id =  $this->getParam("get","id");
		if(!$id){
			$this->error("参数错误");
		}
		$classNameModel = M("className");
		$articleModel = M("article");

		$classname = $classNameModel->where(array("id"=>$id))->find();
		$leftlist = $classNameModel->where(array("pid"=>4))->order("create_time desc")->select();

		$count = $articleModel->where(array("class"=>$id))->order("create_time desc")->count();
		$page = new Page($count,10);

		$list = $articleModel->where(array("class"=>$id))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("classname",$classname);
		$this->assign("id",$id);
		$this->assign("leftlist",$leftlist);
		$this->assign("list",$list);
		$this->assign("left_link","/program/lists/");
		$this->assign("list_link","/program/detail/");
		$this->assign("title","解决方案");
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

		$list = $articleModel->where(array("id"=>$id))->order("create_time desc")->find();

		$this->assign("list",$list);
		$this->assign("title","解决方案");
		$this->display("Public/detail");
	}
}
	
	
?>
