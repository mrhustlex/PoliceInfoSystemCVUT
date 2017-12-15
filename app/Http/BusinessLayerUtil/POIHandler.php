<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:25 AM
 */

namespace App\Http;


class POIHandler implements  IPOIHandler
{
    private $iPOIDaoHandler;

    /**
     * POIHandler constructor.
     */
    public function __construct(IPOIDaoHandler $iPOIDaoHandler)
    {
        $this->$iPOIDaoHandler = $iPOIDaoHandler;
    }

    public function getPersonOfInterest()
    {
        // TODO: Implement getPersonOfInterest() method.
    }

    public function addPersonOfInterest()
    {
        // TODO: Implement addPersonOfInterest() method.
    }

    public function deletePersonOfInterest($id)
    {
        // TODO: Implement deletePersonOfInterest() method.
    }

    public function modifyPersonOfInterest($id)
    {
        // TODO: Implement modifyPersonOfInterest() method.
    }
}