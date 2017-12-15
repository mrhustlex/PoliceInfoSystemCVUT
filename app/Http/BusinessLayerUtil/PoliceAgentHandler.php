<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:25 AM
 */

namespace App\Http;


class PoliceAgentHandler implements IPoliceAgentHandler
{
    private $policeAgent;

    /**
     * PoliceAgentHandler constructor.
     * @param $policeAgentDao
     */
    public function __construct(IPoliceAgentHandler $policeAgent)
    {
        $this->policeAgent = $policeAgent;
    }


    public function getPoliceAgentDetail($id)
    {
        // TODO: Implement getPoliceAgentDetail() method.
    }

    public function addPoliceAgent()
    {
        // TODO: Implement addPoliceAgent() method.
    }

    public function deletePoliceAgent($id)
    {
        // TODO: Implement deletePoliceAgent() method.
    }

    public function modifyPoliceAgent()
    {
        // TODO: Implement modifyPoliceAgent() method.
    }

    public function getPoliceAgentList($sortBy, $order, $type)
    {
        // TODO: Implement getPoliceAgentList() method.
    }
}