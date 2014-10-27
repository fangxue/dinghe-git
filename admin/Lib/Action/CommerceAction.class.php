<?php
//商业保理
class CommerceAction extends BaseAction {
	public function index(){
		$classNameModel = M("className");
		$list = $classNameModel->where(array("pid"=>1))->order("create_time desc")->select();
		$this->assign("list",$list);
		$this->display();
	}
	//管理分类
	public function addClass(){
		$classNameModel = M("className");
		if($this->getParam('post')){
			$data = $this->getParam('post');

			$info["name"] = trim($data["name"]);
			$info["pid"] = 1 ;
			$info["update_time"] = time();

			$res = $classNameModel->where(array("name"=>$info["name"],"pid"=>1))->find();
			if($res){
				$this->error('此分类名已存在,请重新填写！');
			}

			if($data["id"] == ''){
				$info["create_time"] = time();
				$result = $classNameModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/Commerce/index');
				}
			}else{
				$result = $classNameModel->where(array("id"=>$data['id']))->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/Commerce/index');
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
			$this->error("此条记录不存在，或已被删除","/Commerce/index");
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
		$class = $classNameModel->where(array("id"=>$id))->getField("name");
		$articeModel = M("article");
		$list = $articeModel->where(array("class"=>$class))->order("create_time desc")->select();
		$this->assign("list",$list);
		$this->assign("classid",$id);
		$this->assign("title",$class);
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
				// $res = $articleModel->where(array("title"=>$info["title"],"class"=>$class))->find();
				// if($res){
				// 	$this->error('标题重复');
				// }
				$info["create_time"] = time();
				$result = $articleModel->add($info);
				if(is_numeric($result)){
					$this->success('添加成功','/Commerce/articleManage/id/'.$data["classid"]);
				}
			}else{
				$result = $articleModel->where('id='.$data["id"])->save($info);
				if(is_numeric($result)){
					$this->success('修改成功','/Commerce/articleManage/id/'.$data["classid"]);
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
			$this->error("此条记录不存在，或已被删除","/Commerce/articleManage/id/".$id);
		}
		$res = $articleModel->where(array("id"=>$articleid))->delete();
		if(is_numeric($res)){
			$this->success("成功删除");
		}
	}


}