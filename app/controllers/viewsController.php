<?php

	namespace app\controllers;
	use app\models\viewsModel;

	class viewsController extends viewsModel
	{
		public function getViewsController($views)
		{
			if($views != "")
			{
				$reponse = $this->getViewsModel($views);
			} else {
				$response = "login";
			}
			return $reponse;
		}
	}

?>