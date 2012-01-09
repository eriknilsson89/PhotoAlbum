<?php
class AlbumRecord extends TActiveRecord
{
	const TABLE='album';
 
	public $ID;
	public $Name;
	public $Owner;
 
	public static function finder($className=__CLASS__)
	{
		return parent::finder($className);
	}

	public $images=array(); //holds an array of ImageRecord
 
    public static $RELATIONS=array
    (
        'images' => array(self::HAS_MANY, 'ImagesRecord'),
    );

}
?>