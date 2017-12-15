<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:27 AM
 */

namespace App\Http;


use App\PoliceAgentModel;

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

    public function find($id)
    {
        return $this->police_model->find($id);
    }

    public function getPoliceRow($sortBy, $order, $type, $val)
    {
        // TODO: Implement getPoliceRow() method.
    }
}