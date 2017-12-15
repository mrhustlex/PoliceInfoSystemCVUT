<?php

namespace App\Http\Controllers;

use App\Http\IPOIHandler;
use Illuminate\Http\Request;

class PersonOfInterestController extends Controller
{
    private $poi_handler;

    /**
     * PersonOfInterestController constructor.
     * @param $poi_handler
     */
    public function __construct(IPOIHandler $poi_handler)
    {
        $this->poi_handler = $poi_handler;
    }
}
