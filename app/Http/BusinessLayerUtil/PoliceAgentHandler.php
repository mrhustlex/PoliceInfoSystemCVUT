<?php
namespace App\Http;

/**
 * Implements the business layer for the management of the Police Agents
 *
 */
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


    /**
     * Returns the detailed information of an agent of a certain type (if wrong type he will be ignored)
     * @param $policeAgent_id
     *
     */
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

    /**
     * Adds a police Agent to the information system
     * @param $name
     * @param $surname
     * @param $address
     * @param $dob : date of birth
     * @param $username
     * @param $password
     * @param $department : integer
     * @param $type : integer
     *
     */
    public function addPoliceAgent($name, $surname, $address, $dob, $username, $password, $department, $type){
        return $this->policeAgentDaoHandler->addPoliceAgent($name, $surname, $address, $dob, $username, $password, $department, $type);
    }

    /**
     * Changes the role of a police Agent
     * @param $policeAgent_id
     * @param $role
     *
     */
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

    /**
     * Removes a police Agent from the system
     * @param $policeAgent_id
     *
     */
    public function deletePoliceAgent($id)
    {
        // TODO: Implement deletePoliceAgent() method.
        $police = $this->policeAgentDaoHandler->deletePolice($id);
        if($police == null)
            return null;
        else
            return $police;
    }

    /**
     * Returns the lost of the police Agents
     *
     */
    public function getPoliceAgentList()
    {
        $policeAgents = $this->policeAgentDaoHandler->getPoliceRow();
        if($policeAgents == null)
            return null;

        return $policeAgents;
    }

    /**
     * Returns the column names of the table policeAgent
     *
     */
    public function getPoliceAgentTitle()
    {
        // TODO: Implement getCaseTitle() method.
        return $this->policeAgentDaoHandler->getRowTitle();
    }

    /**
     * Returns a list of the departments and the matching id
     * Used to display which department a police Agent belongs to
     * @param $policeAgent_id
     *
     */
    public function getDepartmentStationList(){
        return $this->policeAgentDaoHandler->getDepartmentStationList();
    }
}
