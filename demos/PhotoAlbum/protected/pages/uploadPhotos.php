<?php
class UploadPhotos extends TPage
{
	//funktion som körs när filer laddas upp
    public function fileUploaded($sender,$param)
    {
    	//kollar om det finns en vald fil som ska laddas upp
        if($sender->HasFile)
        {
        	//sparar filen till servern
			$sender->saveAs('images/'.$sender->FileName, true);
			//ger filen ett unikt namn genom att använda time och döper om den
			$newname = time().$sender->FileName;
			rename('images/'.$sender->FileName, 'images/'.$newname);
			//kollar om filen var en bild
			if(getimagesize('images/'.$newname) != FALSE)
			{
				//sparar ner i databasen
				$ir = new ImagesRecord;
				$ir->Album_ID = $this->Request['id'];
				$ir->type = $sender->FileName;
				$ir->size = $sender->FileSize;
				$ir->name = $newname;
				$ir->save();
				//ger ett meddelande
				$this->Result->Text="Images uploaded! Upload more images or view your Album.";
			}
			else
			{
				//tar bort filen från servern igen
				unlink('images/'.$newname);
			}
		
        }
    }
	//funktion som körs när man klickar på 
	public function ViewButtonClicked($sender,$param)
	{
		$id = $this->Request['id'];
		$this->Response->redirect("?page=album&id=$id");
	}
}
 
?>