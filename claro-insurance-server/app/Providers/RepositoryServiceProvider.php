<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\StudentRepositoryInterface;
use App\Repositories\StudentRepository;
use App\Interfaces\CourseRepositoryInterface;
use App\Repositories\CourseRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
