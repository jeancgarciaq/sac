<?php

namespace app\controls;
use app\models\viewsModel;

class viewsController extends viewsModel
{
	public function getViewsController($views)
	{
		if($vista != "")
		{
			$reponse = $this->getViewsModel($views);
		} else {
			$response = "login";
		}
		return $reponse;
	}
}

?>