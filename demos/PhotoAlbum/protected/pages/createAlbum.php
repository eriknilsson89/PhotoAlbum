<?php
 
class CreateAlbum extends TPage
{
	public function onInit($param)
	{
		if($this->User->IsGuest)
		{
			$this->Response->redirect('?page=home');
		}
	}
    public function createAlbumClicked($sender, $param)
	{
		if($this->IsValid)
		{
			$album = new AlbumRecord;
			$finder = $album::finder();
			$sql = "SELECT ID FROM album ORDER BY ID DESC LIMIT 0,1";
			$album->Name = $this->textboxAlbumName->Text;
			$album->Owner = $this->User->Name;
			$album->save();
			$id = $finder->findBySql($sql);
			
			$this->Response->redirect('?page=uploadphotos&id='.$id->ID);
		}
	}
}
 
?>