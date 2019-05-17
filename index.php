<?php

class World {

	public $PowerPlant;
	public $Household;

		public function __construct (PowerPlantInterface $PowerPlant, HouseholdInterface $Household)
		{
			$this->PowerPlant= $PowerPlant;
			$this->Household= $Household;
		}

/**	start and stop Powerplant */
	public function startPowerPlant()
	{
		$this->PowerPlant->switchOnPower();
	}
	public function StopPowerPlant()
	{
		$this->PowerPlant->switchOffPower();
	}

	/**	kill and repair Powerplant */
	public function killPowerPlant()
	{
		$this->PowerPlant->killPowerPlant();
	}

	public function repairPowerPlant()
	{
		$this->PowerPlant->repairPowerPlant();
	}


	/**	connect and disconnect Household */
	public function connectHousehold()
	{
		$this->Household->connectHouseholdToPowerPlant();
	}
	public function disconnectHousehold()
	{
		$this->Household->disconnectHouseholdFromPowerPlant();
	}

/**	 Check $power in PowerPlant and depending on the state connect or disconnect HouseHold to PowerPlant and other cheks... */
 		/**	some code */


}







 /**	 Interface for methods Household */
 interface HouseholdInterface{
	public function connectHouseholdToPowerPlant();
	public function disconnectHouseholdFromPowerPlant();

}


class Household implements HouseholdInterface
{
	/**	Identifier availability Electricity in HouseHold-default state */
	public $electricityInHousehold = 'No';

	public function connectHouseholdToPowerPlant()
	{
		echo ' connectHouseholdToPowerPlant';
	}

	public function disconnectHouseholdFromPowerPlant()
	{
		echo 'disconnectHouseholdFromPowerPlant ';
	}


}


/**
 * Interface for methods PowerPlant
 */
interface PowerPlantInterface
{
	public function switchOnPower();
	public function switchOffPower();
	public function killPowerPlant();
	public function repairPowerPlant();
}


/** base class PowerPlant */

class PowerPlant implements PowerPlantInterface {

	/**	Identifier availability Electricity-default state */
	public $power= "Yes";

	public function	switchOnPower(){
		echo 'PowerPlants_000 switch_On Electricity';
	}
	public function	switchOffPower(){
		echo 'PowerPlants_000 switch_Off Electricity';
	}
	public function killPowerPlant(){
		echo 'kill PowerPlant ';

	}
	public function repairPowerPlant(){
		echo 'repair PowerPlant ';
	}

	public function getPower() {
		echo 'state of PowerPlant is '. $this->power;
	}

	public function setPower($power) {
		echo 'method setPower class =  '.__CLASS__.' is '. $this->power=$power ;
	}

};

/**	child classes PowerPlant */
class PowerPlant_111 extends PowerPlant{

	public function	switchOnPower(){
		echo 'PowerPlants_111 switch_On Electricity';
	}
	public function	switchOffPower(){
		echo 'PowerPlants_111 switch_Off Electricity';
	}
};

class PowerPlant_222 extends PowerPlant{

	public function	switchOnPower(){
		echo 'PowerPlants_222 switch_On Electricity';
	}
	public function	switchOffPower(){
		echo 'PowerPlants_222 switch_Off Electricity';
	}
};




/** create any new  powerPlant  */

$PowerPlant0= new PowerPlant;
$PowerPlant1= new PowerPlant_111;
$PowerPlant2= new PowerPlant_222;

/** create any new  Household  */
$Household= new Household;

/** create any new  World  */
$world0 = new World($PowerPlant0, $Household );
$world1 = new World($PowerPlant1,$Household);
echo $world0->StartPowerPlant();
echo '<br>';
echo $world0->disconnectHousehold();
echo '<br>';
echo $world0->connectHousehold();
echo '<br>';
echo $world0->StopPowerPlant();
echo '<br>';
echo $world1->StartPowerPlant();
echo '<br>';
echo $world1->StopPowerPlant();
echo '<br>';
echo $PowerPlant0->getPower();
echo '<br>';
echo $PowerPlant1->getPower();
echo '<br>';
echo  $PowerPlant1->setPower('No');
