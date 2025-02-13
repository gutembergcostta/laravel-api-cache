<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Course::observe(\App\Observers\CourseObserver::class);
        Module::observe(\App\Observers\ModuleObserver::class);
        Lesson::observe(\App\Observers\LessonObserver::class);
    }
}
