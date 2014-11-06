<?php
class IndexAction extends BaseAction {
	
	public function index()
	{
		if($this->getParam('session','user_id'))
			$this->redirect('/admin.php/PartnerLogo/index');
		else
			$this->redirect('/admin.php/Public/login');
	}

	
}
	
	
?>
