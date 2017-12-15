<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:25 AM
 */

namespace App\Http;


class POIHandler implements  IPOIDaoHandler
{

    /**
     * POIHandler constructor.
     */
    public function __construct(IPOIHandler $i)
    {
    }

    public function getPersonOfInterest($sortBy, $order, $type, $val)
    {
        // TODO: Implement getPersonOfInterest() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}