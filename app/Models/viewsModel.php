<?php 

namespace app\models;

class viewsModel
{

	proteted function getViewsModel($views) 
	{
		$whiteList = ["dashboard","userNew","userList","userUpdate","userSearch","logOut"];

		if(in_array($views, $whiteList))
		{
			if(is_file("app/views/content/".$views."-view.php"))
			{
					$content="app/views/content/".$views."-view.php";
			} else {
				$content="404";
			}
		} elseif($views=="login" || $views=="index")
		{
			$content="login";
		} else {
			$content="404";
		}
		return $content;
	}
}

?>