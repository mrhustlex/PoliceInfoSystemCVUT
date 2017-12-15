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
    public function getPoliceAgentDetail($id);
    public function addPoliceAgent();
    public function deletePoliceAgent($id);
    public function modifyPoliceAgent();
    public function getPoliceAgentList($sortBy, $order, $type);


}