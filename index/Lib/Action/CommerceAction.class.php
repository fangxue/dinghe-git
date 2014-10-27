<?php
class CommerceAction extends BaseAction {
	
	public function index()
	{
		$classNameModel = M("className");
		$list = $classNameModel->where(array("pid"=>1))->order("create_time desc")->select();
		$id = $this->getParam("get","id");
		if($id){
			$classname = $classNameModel->where(array("id"=>$id))->getField("name");
		}else{
			$classname = $classNameModel->where(array("pid"=>1))->order("create_time desc")->limit(1)->getField("name");
		
		}
		$articleModel = M("article");
		$articleInfo = $articleModel->where(array("class"=>$classname))->select();
		
		$this->assign("articlelist",$articleInfo);
		$this->assign("list",$list);
		$this->assign("title","商业保理");
        $this->display();
	}
}
	
	
?>
