<?php

class myAlbums extends TPage
{
	//hämtar ut en lista över alla album en användare har
	public function onLoad($param)
	{
		parent::onLoad($param);
        if(!$this->IsPostBack)
        {
            $this->albumlistRepeater->DataSource=$this->getData();
            $this->albumlistRepeater->dataBind();
        }

	}
	//plockar ut alla album som tillhör den inloggade användaren
	public function getData()
	{
		$finder = AlbumRecord::finder();
		$username = $this->User->Name;
		$sql = "SELECT Name, ID FROM album WHERE Owner = '$username'";
		$db = AlbumRecord::finder()->findAllBySql($sql);
		$arr = Array();
		for ($i=0; $i < count($db); $i++) { 
			$arr[$i]["Name"] = $db[$i]->Name;
			$arr[$i]["Id"] = $db[$i]->ID;
		}
		return $arr;
	}
}

?>