<?php

	class Person {
		private $birthYear;
		private $deathYear;		//variable declaration and definition in php 

		/*	The php constructor to assign the values
		to the created object of this class	*/
		function __construct($birth, $death) {
			$this->birthYear = $birth;
			$this->deathYear = $death;
		}

		/* function defined to find the number of person alive in a specific year */
		function isPersonAlive($year){
			if( $this->birthYear <= $year && $this->deathYear >= $year){
				return true;
			} else {
				return false;
			}
		}

		function alivePerCheckYear($people, $checkYear){
		$countAlive=0;

		foreach($people as $person){
			if($person->isPersonAlive($checkYear)){
				$countAlive++;
			}
		}

		return $countAlive;
		}
	  
	}

	//variable defined to set the range
	$startYear = 1900;
	$endYear = 2018;  
	$aliveDataRecordPerYear=array();
	
	//provided data entry
	$people = array(
	  new Person(1925, 1972),
	  new Person(1901, 1960),
	  new Person(1942, 1999),
	  new Person(1960, 2010),
	  new Person(1931, 2017),
	  new Person(1961, 1995),
	  new Person(1919, 1982)
	);

		
	for($rangeNum = $startYear; $rangeNum <= $endYear; $rangeNum++ ){
		foreach($people as $person){
			$aliveDataRecordPerYear[$rangeNum] = $person->alivePerCheckYear($people, $rangeNum);
		}
	}
	
	//print_r($aliveDataRecordPerYear);
	
	$maxAlive = max($aliveDataRecordPerYear);
	$key = array_search($maxAlive, $aliveDataRecordPerYear);
	
	echo "The year when most number of people alive was ".$key."\n and the number of people ".$maxAlive;
?>