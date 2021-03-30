<?php

namespace App\Providers;

use App\Repository\Interfaces\ItemsInterface;
use App\Repository\Interfaces\ProductInterface;
use App\Repository\Interfaces\SequenceInterface;
use App\Repository\ItemsRepository;
use App\Repository\ProductRepository;
use App\Repository\SequenceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            ItemsInterface::class,
            ItemsRepository::class
        );

        $this->app->bind(
            SequenceInterface::class,
            SequenceRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
