<?php
//新闻动态
class NewsAction extends BaseAction {
	public function index(){
		$classNameModel = M("className");

		$count = $classNameModel->where(array("pid"=>5))->order("sort desc")->count();
		$page = new Page($count,10);

		$list = $classNameModel->where(array("pid"=>5))->order("sort desc")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("list",$list);
		$this->displayPage($page);
		$this->display();
	}
	//管理分类
	public function addClass(){
		$classNameModel = M("className");
		if($this->getParam('post')){
			$data = $this->getParam('post');

			$info["name"] = trim($data["name"]);
			$info["pid"] = 5 ;
			$info["update_time"] = time();
			$info["sort"] = $data["sort"];
			$info["is_list"] = $data["is_list"];
			if($data["is_list"] == 1){
				$info["read_content"] = "";
			}

			if($data["id"] == ''){
				$res = $classNameModel->where(array("name"=>$info["name"],"pid"=>5))->find();
				if($res){
					$this->error('此分类名已存在,请重新填写！');
				}
				$info["create_time"] = time();
				$result = $classNameModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/News/index');
				}
			}else{
				$result = $classNameModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/News/index');
				}
			}
			
		}else{
			$id = $this->getParam('get','id');
			$list = $classNameModel->where(array("id"=>$id))->find();
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
			$this->error("此条记录不存在，或已被删除","/admin.php/News/index");
		}

		$articleModel = M("news");
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
		$newsModel = M("news");
		$class = $classNameModel->where(array("id"=>$id))->getField("name");
		
		$count = $newsModel->where(array("class"=>$id))->order("create_time desc")->count();
		$page = new Page($count,10);

		$list = $newsModel->where(array("class"=>$id))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->assign("list",$list);
		$this->assign("classid",$id);
		$this->assign("title",$class);
		$this->displayPage($page);
		$this->display();
	}

	//管理分类下的文章
	public function addArticle(){
		$newsModel = M("news");
		if($this->getParam('post')){
			$data = $this->getParam('post');
			
			$info["title"] = trim($data["title"]);
			$info["content"] = stripslashes($data['content']);;
			$info["update_time"] = time();
			$info["class"] = $$data["classid"];

			$files = $_FILES["Filedata"];
			if (!empty($_FILES)&&$_FILES['Filedata']&&$_FILES['Filedata']['name']) {
				$res = $this->_upload($files,"/public/Uploads/news/",'/news/');
				$info["img"] = $res;
			}
			
			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $newsModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/News/articleManage/id/'.$data["classid"]);
				}
			}else{
				$result = $newsModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/News/articleManage/id/'.$data["classid"]);
				}
			}
			
		}else{
			$articleid =  $this->getParam("get","articleid");

			$list = $newsModel->where(array("id"=>$articleid))->find();
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
		$articleModel = M("news");
		$info = $articleModel->where(array("id"=>$articleid))->find();
		if(empty($info)){
			$this->error("此条记录不存在，或已被删除","/admin.php/News/articleManage/id/".$id);
		}
		$res = $articleModel->where(array("id"=>$articleid))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
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
				$this->success('修改成功','/admin.php/News/index');
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