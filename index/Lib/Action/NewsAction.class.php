<?php
class NewsAction extends BaseAction {
	
	public function index()
	{
		$this->assign("title","新闻动态");
        $this->display();
	}
}
	
	
?>
