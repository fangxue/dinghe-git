<?php
class IndexAction extends BaseAction {
	
	public function index()
	{

		$logoModel = M("logo");
		$classNameModel = M("className");
		$articleModel = M("article");
		$productModel = M("product");
		$newsModel = M("news");
		$imageModel = M("image");
		$financialModel = M("financial");
		$downloadTableModel = M("downloadTable");

		/*
			首页
		*/
    	$shouye_list = $logoModel->select();
    	$this->assign("shouye_list",$shouye_list);

		$shouye_property = $articleModel->where(array("class"=>"资产管理"))->find();
		$shouye_commerce = $articleModel->where(array("class"=>"商业保理"))->find();
		$shouye_treasure = $articleModel->where(array("class"=>"财富中心"))->find();
		$this->assign("shouye_property",$shouye_property["content"]);
		$this->assign("shouye_commerce",$shouye_commerce["content"]);
		$this->assign("shouye_treasure",$shouye_treasure["content"]);

		/*
			解决方案
		*/
		$program_list = $classNameModel->where(array("pid"=>4))->order("sort desc")->select();
		$this->assign("program_list",$program_list);

		/*
			产品中心
		*/
		$product_info = $productModel->field("class,content")->select();
		$product_arr = array();
		foreach ($product_info as $key => $value) {
			$product_arr[$value['class']] = $value["content"];
		}
		$this->assign("product_list",$product_arr);

		/*
			风控体系
		*/
		$fengkong_info = $newsModel->where(array("class"=>"风控体系"))->find();
		$this->assign("fengkong_list",$fengkong_info);

		/*
			走进鼎赫
		*/
		$dinghe_list = $imageModel->order("create_time desc")->select();

		$aboutModel = M("about");
		$dinghe_res = array();
		$dinghe_res[1] = $aboutModel->where(array("class"=>1))->find();
		$dinghe_res[2] = $aboutModel->where(array("class"=>2))->find();
		$dinghe_res[3] = $aboutModel->where(array("class"=>3))->find();
		$dinghe_res[4] = $aboutModel->where(array("class"=>4))->find();
		$dinghe_res[5] = $aboutModel->where(array("class"=>5))->find();
		$dinghe_res[6] = $aboutModel->where(array("class"=>6))->find();

		$this->assign("dinghe_list",$dinghe_list);
		$this->assign("dinghe_res",$dinghe_res);

		/*
			新闻动态
		*/
		$news_list = $newsModel->where("class != '风控体系'")->order("create_time DESC")->limit("0,2")->select();
		$this->assign("news_list",$news_list);

		/*
			金融课堂
		*/
		$financial_list = $financialModel->order("create_time DESC")->select();
		$this->assign("financial_list",$financial_list);

		/*
			下载中心
		*/
		$downloadTable_list = $downloadTableModel->order("create_time DESC")->select();
		$this->assign("downloadTable_list",$downloadTable_list);


		$this->assign("title","鼎赫");
        $this->display();
	}
}
	
	
?>
