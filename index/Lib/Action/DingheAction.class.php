<?php
class DingheAction extends BaseAction {
	
	public function index()
	{
		$imageModel = M("image");
		$list = $imageModel->order("create_time desc")->select();

		$aboutModel = M("about");
		$res = array();
		$res[1] = $aboutModel->where(array("class"=>1))->find();
		$res[2] = $aboutModel->where(array("class"=>2))->find();
		$res[3] = $aboutModel->where(array("class"=>3))->find();
		$res[4] = $aboutModel->where(array("class"=>4))->find();
		$res[5] = $aboutModel->where(array("class"=>5))->find();
		$res[6] = $aboutModel->where(array("class"=>6))->find();

		$this->assign("list",$list);
		$this->assign("res",$res);
		$this->assign("title","走进鼎赫");
		$this->display();
		}
}
	
	
?>
