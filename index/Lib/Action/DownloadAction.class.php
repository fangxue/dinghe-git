<?php
class DownloadAction extends BaseAction {
	
	public function index()
	{
		$downloadTableModel = M("downloadTable");
		$list = $downloadTableModel->order("create_time DESC")->select();
		$this->assign("list",$list);
		$this->assign("title","下载中心");
		$this->display();
	}
}
	
	
?>
