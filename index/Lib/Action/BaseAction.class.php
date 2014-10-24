<?php
import("ORG.Util.Page");// 导入分页类

class BaseAction extends Action {
/*    function _initialize() {
       
    }*/
    
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
	 * 公用的分页格式
	 * @param Object $page
	 */
	protected function displayPage($page){
		$show = $page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
	}

}
    

	
