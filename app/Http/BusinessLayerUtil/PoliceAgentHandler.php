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


    const TYPE_OFFICER = 0;
    const TYPE_INVESTIGATOR = self::TYPE_OFFICER + 1;
    const TYPE_DETECTIVE = self::TYPE_INVESTIGATOR + 1;
    const TYPE_HEADDPT = self::TYPE_DETECTIVE + 1;
    const TYPE_CHIEF = self::TYPE_HEADDPT + 1;
    
    /**
     * PoliceAgentHandler constructor.
     * @param $policeAgentDao
     */
    public function __construct(IPoliceAgentDaoHandler $policeAgent)
    {
        $this->policeAgentDaoHandler = $policeAgent;
    }


    public function getPoliceAgentDetail($id, $type)
    {
        $policeAgent = $this->policeAgentDaoHandler->getPoliceAgentDetail($id);

        if($type == NULL){
            return $policeAgent;
        } else {
            switch ($type) {
                case self::TYPE_OFFICER:
                    if($policeAgent['role'] != "Officer"){
                        return NULL;
                    }
                    break;
                case self::TYPE_INVESTIGATOR:
                    if($policeAgent['role'] != "Crime Scene Investigator"){
                        return NULL;
                    }
                    break;
                case self::TYPE_DETECTIVE:
                    if($policeAgent['role'] != "Detective"){
                        return NULL;
                    }
                    break;
                case self::TYPE_HEADDPT:
                    if($policeAgent['role'] != "Head of Department"){
                        return NULL;
                    }
                    break;
                case self::TYPE_CHIEF:
                    if($policeAgent['role'] != "Chief Officer"){
                        return NULL;
                    }
                    break;
            }     
        }
        return $policeAgent;
    }

    public function addPoliceAgent($name, $surname, $address, $dob, $username, $password, $department, $type){
        return $this->policeAgentDaoHandler->addPoliceAgent($name, $surname, $address, $dob, $username, $password, $department, $type);
    }

    public function modifyRolePoliceAgent($policeAgent_id, $role)
    {
        switch ($type){
            case self::TYPE_OFFICER:
                return $this->policeAgentDaoHandler->setOfficer($policeAgent_id);
                break;
            case self::TYPE_INVESTIGATOR:
                return $this->policeAgentDaoHandler->setInvestigator($policeAgent_id);
                break;
            case self::TYPE_DETECTIVE:
                return $this->policeAgentDaoHandler->setDetective($policeAgent_id);
                break;
            case self::TYPE_HEADDPT:
                return $this->policeAgentDaoHandler->setHeaddpt($policeAgent_id);
                break;
            case self::TYPE_CHIEF:
                return $this->policeAgentDaoHandler->setChief($policeAgent_id);
                break;            
            default:
                return null;
        }
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

    public function getPoliceAgentList()
    {
        $policeAgents = $this->policeAgentDaoHandler->getPoliceRow();
        if($policeAgents == null)
            return null;
        
        return $policeAgents;
    }

    public function getPoliceAgentTitle()
    {
        // TODO: Implement getCaseTitle() method.
        return $this->policeAgentDaoHandler->getRowTitle();
    }

    public function getDepartmentStationList(){
        return $this->policeAgentDaoHandler->getDepartmentStationList();
    }
}