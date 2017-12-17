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
    public function getPersonOfInterest($id);
    public function addPersonOfInterest($case_id, $name, $surname, $address, $date);
    public function deletePersonOfInterest($id);
    public function getPersonOfInterestList($sortBy, $order, $type);
    public function getPersonOfInterestTitle();
    public function addTestimony($case_id, $type, $date, $statement);
//    public function modifyPersonOfInterest($id);
}