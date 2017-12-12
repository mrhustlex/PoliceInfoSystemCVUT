<?php


namespace App\Http;
use Illuminate\Http\Request;


/**
 * Interface that provides operations to manage cases.
 * @author YuJin
 * @version 1.0
 * @created 05-Dec-2017 1:43:45 PM
 */
interface ICaseHandler
{

	/**
	 * 
	 * @param id
	 */
	public function addCase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time);

	public function editCase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time);

    public function openCase($id);
    public function closeCase($id);

    public function solveCase($id);

    /**
	 * 
	 * @param id
	 */
	public function getCase(int $id);

	public function getCaseList($sortBy, $order, $type);

}
?>