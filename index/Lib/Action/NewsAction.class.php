<?php
class NewsAction extends BaseAction {
	
	public function index()
	{
		$newsModel = M("news");
		$list = $newsModel->where("class != '风控体系'")->order("create_time DESC")->limit("0,2")->select();
		$this->assign("list",$list);
		$this->assign("title","新闻动态");
		$this->display();
	}

	public function lists(){
		$id =  $this->getParam("get","id");

		$classNameModel = M("className");
		$newsModel = M("news");

		$leftlist = $classNameModel->where(array("pid"=>5))->order("create_time desc")->select();


		if($id){
			$classname = $classNameModel->where(array("id"=>$id))->getField("name");
			$this->assign("id",$id);
		}else{
			$class = $classNameModel->where(array("pid"=>5))->order("create_time desc")->limit(1)->find();
			$this->assign("id",$class["id"]);
			$classname = $class["name"];
		}


		$count = $newsModel->where(array("class"=>$classname))->order("create_time desc")->count();
		$page = new Page($count,1);

		$list = $newsModel->where(array("class"=>$classname))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("classname",$classname);
		$this->assign("leftlist",$leftlist);
		$this->assign("list",$list);
		$this->assign("left_link","/news/lists/");
		$this->assign("list_link","/news/detail/");
		$this->assign("title","新闻动态");
		$this->displayPage($page);
		$this->display("Public/lists");
	}

	public function detail()
	{
		$id =  $this->getParam("get","id");
		if(!$id){
			$this->error("参数错误");
		}
		$newsModel = M("news");

		$list = $newsModel->where(array("id"=>$id))->order("create_time desc")->find();

		$this->assign("list",$list);
		$this->assign("title","新闻动态");
		$this->display("Public/detail");
	}
}
	
	
?>
