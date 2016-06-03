<?php

	require_once "../DataAccessObject.php";
	use Dansnet\DataAccessObject;
	
	class DataAccessObjectTest extends PHPUnit_Framework_TestCase {
		
		public function testInitDataAccessObject() {
			$database = new DataAccessObject("test");
			$database->ConnectSqlite3(":memory:");
			$this->assertNotNull($database);
			return $database;
		}
		
		/**
		 * @depends testInitDataAccessObject
		 */
		public function testInsert( DataAccessObject $database ) {
			$database->SqlExecute("CREATE TABLE test(
					ID INTEGER PRIMARY KEY   AUTOINCREMENT,
					column1 text,
					column2 text
			);");
			$database->save(["column1"=>"value1","column2"=>"value1"]);
			$database->save(["column1"=>"value2","column2"=>"value2"]);
			$database->save(["column1"=>"value3","column2"=>"value3"]);
			$database->save(["column1"=>"value4","column2"=>"value4"]);
			$database->save(["column1"=>"value5","column2"=>"value5"]);
			$database->save(["id"=>5, "column1"=>"value6","column2"=>"value6"]);
			return $database;
		}
		
		/**
		 * @depends testInsert
		 */
		public function testSearch( DataAccessObject $database ) {
			$this->assertEquals(5, sizeof($database->getAll()));
			$this->assertEquals(1, sizeof($database->find(["column1"=>"value3"])));
			$this->assertEquals(3, sizeof($database->findPage([], "", 3)));
			$this->assertEquals(2, sizeof($database->findPage([], "", 3, 3)));
			$this->assertEquals("value6", $database->find(["id"=>5])[0]["column1"]);
		}
		
	}
