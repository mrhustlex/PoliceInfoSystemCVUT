<?php
use App\PoliceAgentModel;
use App\Http\PoliceAgentHandler;

$linkAgents = [
    "/police_agent/add" =>"Add Police Agent",
    "/police_agent" => "ALL AGENTS",
    "/police_agent?type=".\App\Http\PoliceAgentHandler::TYPE_OFFICER=>"OFFICER",
    "/police_agent?type=".\App\Http\PoliceAgentHandler::TYPE_INVESTIGATOR=>"INVESTIGATOR",
    "/police_agent?type=".\App\Http\PoliceAgentHandler::TYPE_DETECTIVE=>"DETECTIVE",
    "/police_agent?type=".\App\Http\PoliceAgentHandler::TYPE_HEADDPT=>"HEAD OF DEPARTMENT",
    "/police_agent?type=".\App\Http\PoliceAgentHandler::TYPE_CHIEF=>"CHIEF OF POLICE",
    ];

?>
@extends('layout.app')
@section('title', 'Police Agents')
@include('police_agent.table',['columnNames' => $columnNames, 'items' => $items])

