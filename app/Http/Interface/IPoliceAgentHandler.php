<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:27 AM
 */

namespace App\Http;


interface IPoliceAgentHandler
{
	public function getPoliceAgentDetail($id, $type);
	public function addPoliceAgent($name, $username, $address, $dob, $department, $type);
	public function modifyRolePoliceAgent($policeAgent_id, $role);
	public function deletePoliceAgent($id);
	public function modifyPoliceAgent($id);
	public function getPoliceAgentList();

}