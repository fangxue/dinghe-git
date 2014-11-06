<?php
//下载中心
class DownloadAction extends BaseAction {
	
	public function index(){
		$downloadTableModel = M("downloadTable");

		$count = $downloadTableModel->order("create_time DESC")->count();
		$page = new Page($count,10);

		$list = $downloadTableModel->order("create_time DESC")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("list",$list);
		$this->displayPage($page);
		$this->display();
	}

	public function addTable(){
		$downloadTableModel = M("downloadTable");
		if($this->getParam('post')){
			$data = $this->getParam('post');
			$file = $_FILES['Filedata'];
	
			$info["name"] = trim($data["name"]);
			$info["img_radio"] = $data["img_radio"];
			if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
				$torrent = explode(".", $file["name"]);
				$fileend = end($torrent);
				$fileend = strtolower($fileend);
				// if($fileend !== 'xls'){
				// 	$this->error("文件后缀名必须是xls格式");
				// 	exit;
				// }

				$tmp_name=$file["tmp_name"];

				$savePath = './public/Uploads/downloadTable/';
				import('@.ORG.UploadFile');
				$upload = new UploadFile();
				$upload->savePath = $savePath;
				$upload->saveRule = 'uniqid';
				if(!is_dir($upload->savePath)){
					mkdir($upload->savePath,0777);
				}
				$res = $upload->upload();
				if (!$res) {
					$this->error($upload->getErrorMsg());
				}
				$uploadList = $upload->getUploadFileInfo();
				$info["table_link"] = "/downloadTable/".$uploadList[0]['savename'];
			}
			$info["update_time"] = time();

			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $downloadTableModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/Download/index');
				}
			}else{
				$result = $downloadTableModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/Download/index');
				}
			}
			
		}else{
			$id = $this->getParam('get','id');
			$list = $downloadTableModel->where(array("id"=>$id))->find();
			$this->assign("list",$list);
			$this->assign("id",$id);
			$this->display();
		}
	}

	public function del()
	{
		$id =  $this->getParam("get","id");
		if(empty($id)){
			$this->error("参数错误");
		}
		$downloadTableModel = M("downloadTable");
		$info = $downloadTableModel->where(array("id"=>$id))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/admin.php/Download/index");
		}
		$res = $downloadTableModel->where(array("id"=>$id))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}
	
}
	
	
?>
