<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:28 AM
 */

namespace App\Http;


use App\Model\PersonOfInterestModel;

interface IPOIDaoHandler
{
    public function getPersonOfInterest($case_id);
    public function getPersonOfInterestDetail($poi_id);
    public function addPersonOfInterest($case_id, $name, $surname, $address, $date);
    public function getTestimony($poi_id);
    public function addTestimony($poi_id, $type, $date, $statement);
    public function setSuspect($poi_id);
    public function setCriminal($poi_id);
    public function setVictim($poi_id);
    public function setWitness($poi_id);
    public function getSuspect($poi_id);
    public function getCriminal($poi_id);
    public function getVictim($poi_id);
    public function getWitness($poi_id);
    public function getCase($poi_id);

}