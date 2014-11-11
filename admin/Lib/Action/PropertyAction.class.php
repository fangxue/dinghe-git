<?php
//资产管理
class PropertyAction extends BaseAction {
	public function index(){
		$classNameModel = M("className");

		$count = $classNameModel->where(array("pid"=>2))->order("sort desc")->count();
		$page = new Page($count,10);

		$list = $classNameModel->where(array("pid"=>2))->order("sort desc")->limit($page->firstRow.','.$page->listRows)->select();
		
		$articleModel = M("article");
		$info = $articleModel->where(array("class"=>"资产管理"))->find();
		$this->assign("info",$info);

		$this->assign("list",$list);
		$this->displayPage($page,"/admin.php");
		$this->display();
	}
	//管理分类
	public function addClass(){
		$classNameModel = M("className");
		if($this->getParam('post')){
			$data = $this->getParam('post');

			$info["name"] = trim($data["name"]);
			$info["pid"] = 2;
			$info["update_time"] = time();
			$info["sort"] = $data["sort"];
			$info["is_list"] = $data["is_list"];
			if($data["is_list"] == 1){
				$info["read_content"] = "";
			}

			if($data["id"] == ''){
				$res = $classNameModel->where(array("name"=>$info["name"],"pid"=>2))->find();
				if($res){
					$this->error('此分类名已存在,请重新填写！');
				}
				$info["create_time"] = time();
				$result = $classNameModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/Property/index');
				}
			}else{
				$result = $classNameModel->where('id='.$data["id"])->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/Property/index');
				}
			}
			
		}else{
			$id = $this->getParam('get','id');
			$list = $classNameModel->where('id='.$id)->find();
			$this->list =  $list;
			$this->id =  $id;
			$this->display();
		}
	}

	//删除分类
	public function del()
	{
		$id =  $this->getParam("get","id");
		if(empty($id)){
			$this->error("参数错误");
		}
		$classNameModel = M("className");
		$info = $classNameModel->where(array("id"=>$id))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/admin.php/Property/index");
		}
		$articleModel = M("article");
		$articleInfo = $articleModel->where(array("class"=>$info["name"]))->select();
		if(!empty($articleInfo)){
			$this->error("此分类下有文章，不可删除");
		}
		$res = $classNameModel->where(array("id"=>$id))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}

	
	public function articleManage(){
		$id =  $this->getParam("get","id");
		$classNameModel = M("className");
		$articeModel = M("article");
		$class = $classNameModel->where(array("id"=>$id))->getField("name");

		$count = $articeModel->where(array("class"=>$id))->order("create_time desc")->count();
		$page = new Page($count,10);
		
		$list = $articeModel->where(array("class"=>$id))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("list",$list);
		$this->assign("classid",$id);
		$this->assign("title",$class);
		$this->displayPage($page,"/admin.php");
		$this->display();
	}

	//管理分类下的文章
	public function addArticle(){
		$articleModel = M("article");
		if($this->getParam('post')){

			$data = $this->getParam('post');
			$info["title"] = trim($data["title"]);
			$info["content"] = stripslashes($data['content']);
			$info["class"] = $data["classid"];
			$info["update_time"] = time();
			$info["img"] = '';
			

			if($data["id"] == ''){
				//$res = $articleModel->where(array("title"=>$info["title"],"class"=>$class))->find();
				//if($res){
				//	$this->error('标题重复');
				//}
				$info["create_time"] = time();
				$result = $articleModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/Property/articleManage/id/'.$data["classid"]);
				}
			}else{
				$result = $articleModel->where('id='.$data["id"])->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/Property/articleManage/id/'.$data["classid"]);
				}
			}
			
		}else{
			$articleid =  $this->getParam("get","articleid");

			$list = $articleModel->where(array("id"=>$articleid))->find();
			$this->assign("list",$list);

			$id =  $this->getParam("get","id");
			$class = $classNameModel->where(array("id"=>$id))->getField("name");
			$this->assign("classid",$id);
			$this->assign("title",$class);
			$this->assign("classid",$id);
			$this->display();
		}
	}

	public function delarticle(){
		$articleid =  $this->getParam("get","articleid");
		$id =  $this->getParam("get","id");
		if(empty($articleid)){
			$this->error("参数错误");
		}
		$articleModel = M("article");
		$info = $articleModel->where(array("id"=>$articleid))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/admin.php/Property/articleManage/id/".$id);
		}
		$res = $articleModel->where(array("id"=>$articleid))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}

	//编辑主内容
	public function addcontent(){
		$articleModel = M("article");
		$data = $this->getParam('post');
		$content = str_replace('<p><br/></p>','',stripslashes($data["content"])); 
		
		$info["content"] = $content;
		$info["update_time"] = time();
		$res = $articleModel->where(array("class"=>"资产管理"))->find();
		if(empty($res)){
			$info["title"] = "资产管理";
			$info["class"] = "资产管理";
			$info["create_time"] = time();
			$articleModel->add($info);
		}else{
			$articleModel->where(array("class"=>"资产管理"))->save($info);
		}
		echo json_encode(array('str' =>$info["content"]));exit; 
	}

	//阅读模式--管理主内容
	public function readContent(){
		$classNameModel = M("className");
		if($this->getParam('post')){
			$data = $this->getParam('post');

			$info["read_content"] = stripslashes($data['content']);
			$info["update_time"] = time();

			$result = $classNameModel->where(array("id"=>$data['id']))->save($info);
			if(is_numeric($result)){
				$this->success('修改成功','/admin.php/Property/index');
			}

		}else{
			$id = $this->getParam('get','id');
			$list = $classNameModel->where(array("id"=>$id))->find();
			if($list["is_list"] == 1){
				$this->error('当前二级分类不是阅读模式！');
			}
			$this->assign("list",$list);
			$this->assign("id",$id);
			$this->display();
		}
	}
}