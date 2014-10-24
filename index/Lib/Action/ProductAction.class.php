<?php
class ProductAction extends BaseAction {
	
	public function index()
	{
		$this->assign("title","产品中心");
        $this->display();
	}
}
	
	
?>
