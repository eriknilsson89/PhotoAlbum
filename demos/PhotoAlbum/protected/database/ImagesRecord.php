<?php
class ImagesRecord extends TActiveRecord
{
	const TABLE='images';
 
	public $ID;
	public $Album_ID;
	public $type;
	public $size;
	public $name;
 
	public static function finder($className=__CLASS__)
	{
		return parent::finder($className);
	}
	public $album;
	public static $RELATIONS=array
    (
        'album' => array(self::BELONGS_TO, 'AlbumRecord'),
    );
}
?>