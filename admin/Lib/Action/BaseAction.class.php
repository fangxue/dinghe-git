<?php
import("ORG.Util.Page");// 导入分页类

class BaseAction extends Action {

	public  $department;
	public  $position;
	
    function _initialize() {
        if ( 'public' != strtolower(MODULE_NAME)) {
            $user_id = $this->getParam('session','user_id');     	
        	if(!$user_id) {
        		redirect('/Public/login');
        	}
        }
       $this->_checkUserPri();
        $this->_setTemplate();
    }
    private function _checkUserPri(){
    	$user = $this->getParam('session','user_info');
    	if($user['is_admin']!=1 && 'admin' == strtolower(MODULE_NAME)){
    		$this->error('您没有权限查看此页面');
    	}
    }
    
    /**
     * 根据type的值来获取相应的数值
     * @param string $type 可以是'post','get','session','put','cookie','server','request','globals'
     * @param string $name 如果不为空则返回相应的数据，若为空则返回对应类型的数组数据
     * @return $value 如果不为空则返回相应的数据，若为空则返回对应类型的数组数据
     */
    protected function getParam($type,$name=""){
    	$name = (!empty($name))? $name : null;
    	if($type == 'post'){
    		$value = $this->_post($name);
    	}else if($type == 'get'){
    		$value = $this->_get($name);
    	}else if($type == 'session'){
    		$value = $this->_session($name);
    	}else if($type == 'put'){
    		$value = $this->_put($name);
    	}else if($type == 'cookie'){
    		$value = $this->_cookie($name);
    	}else if($type == 'server'){
    		$value = $this->_server($name);
    	}else if($type == 'request'){
    		$value = $this->_request($name);
    	}else if($type == 'globals'){
    		$value = $this->_globals($name);
    	}
    	return $value;
    }
    
	/**
	 * 
	 * 给模板文件公共的内容设置数据
	 * 
	 */
	private function  _setTemplate(){
		$current = "";
		SWITCH(strtolower(MODULE_NAME)){
			CASE 'partnerlogo':
				$current = "partnerlogo";
			BREAK;
			CASE 'commerce':
				$current = "commerce";
			BREAK;
			CASE 'property':
				$current = "property";
			BREAK;
			CASE 'treasure':
				$current = "treasure";
			BREAK;
			CASE 'financing':
				$current = "financing";
			BREAK;
			CASE 'program':
				$current = "program";
				BREAK;
			CASE 'product':
				$current = "product";
				BREAK;
			CASE 'fengkong':
				$current = "fengkong";
				BREAK;
			CASE 'news':
				$current = "news";
				BREAK;
			CASE 'financial':
				$current = "financial";
				BREAK;
			CASE 'download':
				$current = "download";
				BREAK;
			default:
				$current = "user";
			BREAK;
			
		}
		$user = $this->getParam('session','user_info');
		$this->assign('WebHost',C("WEB_HOST"));
		$this->assign('current',$current);
		$this->assign('current_user',$user);
	
	}	

	/**
	 * 
	 * 公用的分页格式
	 * @param Object $page
	 */
	protected function displayPage($page){
		$show = $page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
	}

	/**
	*上传图片
	*/
	function _upload($file,$uploadurl,$url){
		$name = explode('.', $file["name"]);
		$fileName = md5($name[0]);
		import('@.ORG.UploadFile');
		//导入上传类
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize            = 3292200;
		//设置上传文件类型
		$upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
		//设置附件上传目录
		$upload->savePath           = '..'.$uploadurl;
		//设置需要生成缩略图，仅对图像文件有效
		$upload->thumb              = true;
		// 设置引用图片类库包路径
		$upload->imageClassPath     = '@.ORG.Image';
		//设置需要生成缩略图的文件前缀
		$upload->thumbPrefix        = 'm_';  //生产2张缩略图
		//设置生成缩略图的文件后缀
		$upload->thunbSuffix        = 'jpg';
		//设置缩略图最大宽度
		$upload->thumbMaxWidth      = '400,35,1000';
		//设置缩略图最大高度
		$upload->thumbMaxHeight     = '400,35,1000';
		//设置上传文件规则
		$upload->saveRule           = 'uniqid';
		//删除原图
		$upload->thumbRemoveOrigin  = true;
	
		$upload->thumbFile  = "$fileName";
		if(!is_dir($upload->savePath)){
			mkdir($upload->savePath,0777);

		}
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		} else {
			$uploadList = $upload->getUploadFileInfo();		
		
			return $url.$fileName.".".$uploadList[0]['extension'];
		}
	
	}

}
    

	
