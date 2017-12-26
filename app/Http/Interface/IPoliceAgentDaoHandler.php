<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:28 AM
 */
namespace App\Http;
interface IPoliceAgentDaoHandler
{
	public function all();
	public function getPoliceAgentDetail($id);
	public function addPoliceAgent($name, $surname, $address, $dob, $username, $password, $department, $type);
	public function setOfficer($policeAgent_id);
	public function setInvestigator($policeAgent_id);
	public function setDetective($policeAgent_id);
	public function setHeaddpt($policeAgent_id);
	public function setChief($policeAgent_id);
}