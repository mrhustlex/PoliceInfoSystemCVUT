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
    public function getPersonOfInterest();
    public function addPersonOfInterest();
    public function deletePersonOfInterest($id);
//    public function modifyPersonOfInterest($id);
}