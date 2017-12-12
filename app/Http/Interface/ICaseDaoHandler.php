<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/12/2017
 * Time: 9:52 AM
 */

namespace App\Http;


interface ICaseDaoHandler
{
    public function getCaseRow($sortBy, $order, $type, $val);

    public function all();
    public function find($id);

}