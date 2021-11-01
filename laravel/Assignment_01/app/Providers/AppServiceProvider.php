<?php

namespace App\Providers;

use App\Contracts\Dao\Author\AuthorDaoInterface;
use App\Contracts\Dao\Book\BookDaoInterface as BookBookDaoInterface;
use App\Contracts\Services\Author\AuthorServiceInterface;
use App\Contracts\Services\Book\BookServiceInterface as BookBookServiceInterface;
use App\Dao\Author\AuthorDao;
use App\Dao\Book\BookDao as BookBookDao;
use App\Services\Author\AuthorService;
use App\Services\Book\BookService as BookBookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind(BookBookDaoInterface::class, BookBookDao::class);
        $this->app->bind(AuthorDaoInterface::class, AuthorDao::class);
        // Services Registration
        $this->app->bind(BookBookServiceInterface::class, BookBookService::class);
        $this->app->bind(AuthorServiceInterface::class, AuthorService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
