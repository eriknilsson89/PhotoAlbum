<?php
/**
 * Auto generated by prado-cli.php on 2007-05-01 05:29:32.
 */
class Employee extends TActiveRecord
{
	const TABLE='Employees';

	public $EmployeeID;
	public $LastName;
	public $FirstName;
	public $Title;
	public $TitleOfCourtesy;
	public $BirthDate;
	public $HireDate;
	public $Address;
	public $City;
	public $Region;
	public $PostalCode;
	public $Country;
	public $HomePhone;
	public $Extension;
	public $Photo;
	public $Notes;
	public $ReportsTo;
	public $PhotoPath;

	public $Territories=array();
	public $Orders=array();
	public $Subordinates=array();
	public $Superior;

	public static $RELATIONS = array
	(
		'Territories' => array(self::MANY_TO_MANY, 'Territory', 'EmployeeTerritories'),
		'Orders' => array(self::HAS_MANY, 'Order'),

		//parent children relationship
		'Subordinates' => array(self::HAS_MANY, 'Employee'),
		'Superior' => array(self::BELONGS_TO, 'Employee')
	);

	public static function finder($className=__CLASS__)
	{
		return parent::finder($className);
	}
}
?>