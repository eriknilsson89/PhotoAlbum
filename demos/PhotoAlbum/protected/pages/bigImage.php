<?php
 
class bigImage extends TPage
{
	//laddar in bilden som ska visas. Hämtar bildID från url och plockar ut infom om den bilden från databasen
	public function onLoad($param)
	{
		$imageId = $this->Request["imageId"];
		$sql = "SELECT name FROM images WHERE ID = $imageId";
		$image = ImagesRecord::finder()->findBySql($sql);
		$this->BigImage->ImageUrl = "images/".$image->name;
	}
	//knapp som leder tillbaka till albumet
	public function BackButtonClicked($sender, $param)
	{
		$albumId = $this->Request["albumId"];
		$this->Response->redirect("?page=album&id=$albumId");
	}
}
 
?>