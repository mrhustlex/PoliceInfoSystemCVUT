<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:28 AM
 */

namespace App\Http;


interface IPOIHandler
{
    public function getPersonOfInterest($case_id);
    public function addPersonOfInterest($case_id, $name, $surname, $address, $date);
    public function deletePersonOfInterest($poi_id);
    public function addTestimony($poi_id, $type, $date, $statement);
    public function getTestimony($poi_id);
    public function modifyPersonOfInterest($poi_id, $type);
    public function getPersonOfInterestRole($poi_id);
    public function getPersonOfInterestDetail($poi_id);

}