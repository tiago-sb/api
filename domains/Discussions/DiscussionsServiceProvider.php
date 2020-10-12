<?php

namespace Domains\Discussions;

use Domains\Discussions\Models\Question;
use Domains\Discussions\Observers\QuestionObserver;
use Illuminate\Support\ServiceProvider;

class DiscussionsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        $this->bootRoutes();
        $this->bootObservers();
    }

    private function bootRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    private function bootObservers(): void
    {
        Question::observe(QuestionObserver::class);
    }
}
