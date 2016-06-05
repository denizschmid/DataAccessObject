<?php			
	/**
	 * VORSICHT: 
	 * Diese Klasse wurde automatisch generiert. Änderungen werden bei der nächsten
	 * Erstellung überschrieben. Sollte das Model erweitert werden muss die Klasse
	 * abgeleitet werden.
	 */
	namespace Dansnet;
	

	class TestModel  {

		private $_fromDatabaseTable;

		private $ID;

		private $column1;

		private $column2;
	
		public function __construct( $data=[] ) {
			$this->_fromDatabaseTable = "test";
			$this->createFromArray($data);
		}
			
		private function createFromArray( $data ) {
			$reflect = new \ReflectionClass($this);
			$properties = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
			foreach( $properties as $member ) {
				if( !array_key_exists($member->name, $data) ) continue;
				$this->{$member->name} = $data[$member->name];
			}
		}
			

		public function getID() {
			return $this->ID;
		}

		public function getColumn1() {
			return $this->column1;
		}

		public function getColumn2() {
			return $this->column2;
		}

			
	}