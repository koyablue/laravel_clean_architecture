<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use packages\Infrastracture\Memo\MemoQueryService;
use packages\Infrastracture\Memo\MemoRepository;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MemoRepositoryInterface::class, MemoRepository::class);
        $this->app->bind(MemoCreateUseCaseInterface::class, MemoCreateInteractor::class);
        $this->app->bind(MemoQueryServiceInterface::class, MemoQueryService::class);
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
