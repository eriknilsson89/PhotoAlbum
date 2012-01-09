<?php
 
class editAlbum extends TPage
{
	//kollar om den inloggade användaren äger detta album. Annars redirect till startsida.
	public function onInit($param)
	{
		$albumId = $this->Request["id"];
		$owner = AlbumRecord::finder()->findBySql("SELECT Owner FROM album WHERE ID = $albumId");
		if($this->User->Name != $owner->Owner)
		{
			$this->Response->redirect("?page=home");
		}

	}
	//laddar in alla bilder från server och databas.
	public function onLoad($param)
	{
		parent::onLoad($param);
        if(!$this->IsPostBack)
        {
            $this->albumRepeater->DataSource=$this->getData();
            $this->albumRepeater->dataBind();
        }
		//om en remove-länk klickas på så tas bilden bort.
		if(isset($_GET['remove']))
		{
			$imageId = $_GET['remove'];
			$albumId = $_GET['id'];
			$sql = "DELETE FROM images WHERE ID = $imageId";
			ImagesRecord::finder()->deleteByPk($imageId);
			$this->Response->redirect("?page=editAlbum&id=".$albumId);
		}
	}
	//plockar ut allt innehåll från databasen om de bilder som finns i albumet 
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
	//hämtar ut namnet på dte berörda albumet
	public function getAlbumName()
	{
		$albumId = $_GET["id"];
		$sql = "SELECT Name FROM album WHERE ID = $albumId";
		$albumName = AlbumRecord::finder()->findBySql($sql);
		return $albumName;
	}
	//knapp som leder till uppladdningsisdan så man kan lägga till mer foton till ett befintligt album
	public function addAlbumClicked($sender, $param)
	{
		$albumId = $_GET["id"];
		$this->Response->redirect("?page=uploadphotos&id=$albumId");
	}

}
 
?>