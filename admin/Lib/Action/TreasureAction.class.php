<?php
//财富中心
class TreasureAction extends BaseAction {
	public function index(){
		$classNameModel = M("className");

		$count = $classNameModel->where(array("pid"=>3))->order("create_time desc")->count();
		$page = new Page($count,10);

		$list = $classNameModel->where(array("pid"=>3))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		
		$articleModel = M("article");
		$info = $articleModel->where(array("class"=>"财富中心"))->find();
		$this->assign("info",$info);
		
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
			$info["pid"] = 3;
			$info["update_time"] = time();

			$res = $classNameModel->where(array("name"=>$info["name"],"pid"=>3))->find();
			if($res){
				$this->error('此分类名已存在,请重新填写！');
			}

			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $classNameModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/admin.php/Treasure/index');
				}
			}else{
				$result = $classNameModel->where('id='.$data["id"])->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/Treasure/index');
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
			$this->error("此条记录不存在，或已被删除","/admin.php/Treasure/index");
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

		$count = $articeModel->where(array("class"=>$class))->order("create_time desc")->count();
		$page = new Page($count,10);
		
		$list = $articeModel->where(array("class"=>$class))->order("create_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("list",$list);
		$this->assign("classid",$id);
		$this->assign("title",$class);
		$this->displayPage($page);
		$this->display();
	}

	//管理分类下的文章
	public function addArticle(){
		$articleModel = M("article");
		$classNameModel = M("className");
		if($this->getParam('post')){
			$data = $this->getParam('post');

			$class = $classNameModel->where(array("id"=>$data["classid"]))->getField("name");
			$info["title"] = trim($data["title"]);
			$info["content"] = stripslashes($data['content']);
			$info["class"] = $class;
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
					$this->success('添加成功','/admin.php/Treasure/articleManage/id/'.$data["classid"]);
				}
			}else{
				$result = $articleModel->where('id='.$data["id"])->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/admin.php/Treasure/articleManage/id/'.$data["classid"]);
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
			$this->error("此条记录不存在，或已被删除","/admin.php/Treasure/articleManage/id/".$id);
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
		$res = $articleModel->where(array("class"=>"财富中心"))->find();
		if(empty($res)){
			$info["title"] = "财富中心";
			$info["class"] = "财富中心";
			$info["create_time"] = time();
			$articleModel->add($info);
		}else{
			$articleModel->where(array("class"=>"财富中心"))->save($info);
		}
		echo json_encode(array('str' =>$info["content"]));exit; 
	}
}