<?php

namespace App\Providers;

use App\Http\CaseDAOHandler;
use App\Http\ICaseDaoHandler;
use App\Http\caseHandler;
use App\Http\ICaseHandler;
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
        $this->app->bind(ICaseHandler::class, CaseHandler::class);
        $this->app->bind(ICaseDaoHandler::class, CaseDAOHandler::class);
    }
}
