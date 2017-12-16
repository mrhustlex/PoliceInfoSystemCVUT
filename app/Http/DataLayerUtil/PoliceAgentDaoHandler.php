<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:27 AM
 */

namespace App\Http;


use App\Model\PoliceAgentModel;

class PoliceAgentDaoHandler implements IPoliceAgentDaoHandler
{

    private $police_model;
    /**
     * PoliceAgentDaoHandler constructor.
     */
    public function __construct(PoliceAgentModel $policeAgentModel)
    {
        $this->police_model = $policeAgentModel;
    }

    public function all()
    {
        return $this->police_model->all();
    }


    public function getPoliceRow($sortBy, $order, $type)
    {
        // TODO: Implement getPoliceRow() method.
    }

    public function addPolice()
    {
        // TODO: Implement addPolice() method.
    }

    public function deletePolice($id)
    {
        // TODO: Implement deletePolice() method.
    }

    public function modifyPolice($id)
    {
        // TODO: Implement modifyPolice() method.
    }

    public function getPolice($id)
    {
        // TODO: Implement getPolice() method.
        return $this->police_model->find($id);
    }
}