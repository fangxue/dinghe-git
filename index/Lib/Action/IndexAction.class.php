<?php
class IndexAction extends BaseAction {
	
	public function index()
	{
		$logoModel = M("logo");
    	$list = $logoModel->select();
    	$this->assign("list",$list);
		$this->assign("title","鼎赫");
        $this->display();
	}
}
	
	
?>
