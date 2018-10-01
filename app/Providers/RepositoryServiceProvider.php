<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
          $this->app->bind(
            'App\Repo\Repository\Category\CategoryRepositoryInterface',
            'App\Repo\Repository\Category\CategoryRepository'
          );
       
          $this->app->bind(
            'App\Repo\Repository\User\UserRepositoryInterface',
            'App\Repo\Repository\User\UserRepository'
          );
          $this->app->bind(
            'App\Repo\Repository\Book\BookRepositoryInterface',
            'App\Repo\Repository\Book\BookRepository'
          );
       
          $this->app->bind(
            'App\Repo\Repository\Author\AuthorRepositoryInterface',
            'App\Repo\Repository\Author\AuthorRepository'
          );
          $this->app->bind(
            'App\Repo\Repository\Language\LanguageRepositoryInterface',
            'App\Repo\Repository\Language\LanguageRepository'
          );
       
          $this->app->bind(
            'App\Repo\Repository\Admin\AdminRepositoryInterface',
            'App\Repo\Repository\Admin\AdminRepository'
          );
          $this->app->bind(
            'App\Repo\Repository\Rating\RatingRepositoryInterface',
            'App\Repo\Repository\Rating\RatingRepository'
          );
        
    }
}
