<?php
 
class Album extends TPage
{
	//kollar om den inloggade användaren är ägare av albumet, annars redirect till startsidan
	public function onInit($param)
	{
		$albumId = $this->Request["id"];
		$owner = AlbumRecord::finder()->findBySql("SELECT Owner FROM album WHERE ID = $albumId");
		if($this->User->Name != $owner->Owner)
		{
			$this->Response->redirect("?page=home");
		}

	}
	//när sidan laddas så hämtas de bilder som tillhör albumet till en repeater
	public function onLoad($param)
	{
		parent::onLoad($param);
        if(!$this->IsPostBack)
        {
            $this->albumRepeater->DataSource=$this->getData();
            $this->albumRepeater->dataBind();
        }

	}
	//hämtar ut info om bilder från databas
	public function getData()
	{
		$albumId = $_GET["id"];
		$sql = "SELECT * FROM images WHERE Album_ID = '$albumId'";
		$db = ImagesRecord::finder()->findAllBySql($sql);

		$arr = Array();
		for ($i=0; $i < count($db); $i++) { 
			$arr[$i]["Id"] = $db[$i]->ID;
			$arr[$i]["Album_Id"] = $db[$i]->Album_ID;
			$arr[$i]["type"] = $db[$i]->type;
			$arr[$i]["size"] = $db[$i]->size;
			$arr[$i]["name"] = $db[$i]->name;
			
		}
		return $arr;
	}
	//hämtar albumets namn
	public function getAlbumName()
	{
		$albumId = $_GET["id"];
		$sql = "SELECT Name FROM album WHERE ID = $albumId";
		$albumName = AlbumRecord::finder()->findBySql($sql);
		return $albumName;
	}
	//när man klickar på knappen "edit" blir man skickad till rätt sida
	public function editAlbumClicked($sender, $param)
	{
		$id = $_GET['id'];
		$this->Response->redirect('?page=editAlbum&id='.$id);
	}
	
}
 
?>