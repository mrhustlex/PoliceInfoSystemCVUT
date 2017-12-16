<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:28 AM
 */

namespace App\Http;


interface IPOIDaoHandler
{
    public function getPersonOfInterest($id);
    public function all();
    public function find($id);
    public function addTestimony($case_id, $type, $date, $statement);
    public function getTestimony($case_id);
    public function getSuspect($case_id);
    public function getCriminal($case_id);
    public function getVictim($case_id);
    public function getWitness($case_id);
    public function getRowTitle();

}