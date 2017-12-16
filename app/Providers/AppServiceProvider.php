<?php

namespace App\Providers;

use App\Http\CaseDAOHandler;
use App\Http\ICaseDaoHandler;
use App\Http\caseHandler;
use App\Http\ICaseHandler;
use App\Http\IPOIDaoHandler;
use App\Http\IPOIHandler;
use App\Http\IPoliceAgentDaoHandler;
use App\Http\IPoliceAgentHandler;
use App\Http\POIDAOHandler;
use App\Http\POIHandler;
use App\Http\PoliceAgentDaoHandler;
use App\Http\PoliceAgentHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //case
        $this->app->bind(ICaseHandler::class, CaseHandler::class);
        $this->app->bind(ICaseDaoHandler::class, CaseDAOHandler::class);
        //POI
        $this->app->bind(IPOIHandler::class, POIHandler::class);
        $this->app->bind(IPOIDaoHandler::class, POIDAOHandler::class);
        //Police
        $this->app->bind(IPoliceAgentHandler::class, PoliceAgentHandler::class);
        $this->app->bind(IPoliceAgentDaoHandler::class, PoliceAgentDaoHandler::class);
    }

}
