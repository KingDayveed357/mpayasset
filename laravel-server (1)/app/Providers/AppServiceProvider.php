<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\UserProfileComposer;


class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Register the view composer for specific views or globally
    View::composer(
        ['profile', 'myaccount', 'change-pin'], // List the views where you need the user profile
        UserProfileComposer::class
    );
    }
}

