<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\EventRepository;
use App\Repositories\WorkshopMeasuresRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->RegisterEventRepo();
        $this->RegisterWorkshopMeasuresRepo();
        $this->RegisterEventTeamsRepo();
        $this->RegisterEventTracksRepo();
        $this->RegisterEventTeamTracksRepo();
        $this->RegisterEventPenaltiesRepo();
        $this->RegisterBasePenaltyRepo();
        $this->RegisterEventTeamTrackWorkshopsRepo();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    public function RegisterEventRepo(){
        return $this->app->bind(BaseRepository::class,EventRepository::class);
    }
    public function RegisterWorkshopMeasuresRepo(){
        return $this->app->bind(BaseRepository::class,WorkshopMeasuresRepository::class);
    }
    public function RegisterEventTeamsRepo(){
        return $this->app->bind(BaseRepository::class,EventTeamsRepository::class);
    }
    public function RegisterEventTracksRepo(){
        return $this->app->bind(BaseRepository::class,EventTracksRepository::class);
    }
    public function RegisterEventTeamTracksRepo(){
        return $this->app->bind(BaseRepository::class,EventTeamTracksRepository::class);
    }
    public function RegisterEventPenaltiesRepo(){
        return $this->app->bind(BaseRepository::class,EventPenaltiesRepository::class);
    }
    public function RegisterBasePenaltyRepo(){
        return $this->app->bind(BaseRepository::class,BasePenaltyRepository::class);
    }
    public function RegisterEventTeamTrackWorkshopsRepo(){
        return $this->app->bind(BaseRepository::class,EventTeamTrackWorkshopsRepository::class);
    }

}
