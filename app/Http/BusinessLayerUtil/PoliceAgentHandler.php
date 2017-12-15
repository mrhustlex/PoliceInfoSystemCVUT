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
    private $policeAgentDaoHandler;

    /**
     * PoliceAgentHandler constructor.
     * @param $policeAgentDao
     */
    public function __construct(IPoliceAgentDaoHandler $policeAgent)
    {
        $this->policeAgentDaoHandler = $policeAgent;
    }


    public function getPoliceAgentDetail($id)
    {
        // TODO: Implement getPoliceAgentDetail() method.
        $police = $this->policeAgentDaoHandler->getPolice($id);
        if($police == null)
            return null;
        else
            return $police;
    }

    public function addPoliceAgent()
    {
        // TODO: Implement addPoliceAgent() method.
        $police = $this->policeAgentDaoHandler->addPolice();
        if($police == null)
            return null;
        else
            return $police;
    }

    public function deletePoliceAgent($id)
    {
        // TODO: Implement deletePoliceAgent() method.
        $police = $this->policeAgentDaoHandler->deletePolice($id);
        if($police == null)
            return null;
        else
            return $police;
    }

    public function modifyPoliceAgent($id)
    {
        // TODO: Implement modifyPoliceAgent() method.
        $police = $this->policeAgentDaoHandler->modifyPolice($id);
        if($police == null)
            return null;
        else
            return $police;
    }

    public function getPoliceAgentList($sortBy, $order, $type)
    {
        // TODO: Implement getPoliceAgentList() method.
        $cases = $this->policeAgentDaoHandler->getPoliceRow($sortBy, $order, $type);
        if($cases == null)
            return null;
        return $cases;
    }
}