<?php
 
class Home extends TPage
{
	//när sidan laddas kollas det om det är en inloggad användare. I så fall hämtas en slumpad bild från den användarens
	//album, om den har ett album.
    public function onLoad($param)
	{
		if(!$this->User->IsGuest)
		{
			$albumArr = AlbumRecord::finder()->findAllByOwner($this->User->Name);
			if(count($albumArr) > 0)
			{
				$random = rand(0, count($albumArr) - 1);
				$album = $albumArr[$random]->ID;
				$imageArr = ImagesRecord::finder()->findAllByAlbum_ID($album);
				$random = rand(0, count($imageArr));
				$this->randomPic->ImageUrl = "images/".$imageArr[$random]->name;
			}
		}
	}
}
 
?>