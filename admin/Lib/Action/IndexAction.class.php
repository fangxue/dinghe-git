<?php
class IndexAction extends BaseAction {
	
	public function index()
	{
		if($this->getParam('session','user_id'))
			$this->redirect('/PartnerLogo/index');
		else
			$this->redirect('/Public/login');
	}

	
}
	
	
?>
