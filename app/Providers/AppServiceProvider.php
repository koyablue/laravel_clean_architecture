<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Domain\Application\Memo\MemoDeleteInteractor;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use packages\Infrastructure\Memo\MemoQueryService;
use packages\Infrastructure\Memo\MemoRepository;
use packages\Mock\Interactor\MockMemoCreateInteractor;
use packages\Mock\MockMemoRepository;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;
use packages\UseCase\Memo\Delete\MemoDeleteUseCaseInterface;
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
        $this->normalRegister();

//        $this->registerForTest();
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

    private function normalRegister()
    {
        $this->app->bind(MemoRepositoryInterface::class, MemoRepository::class);
        $this->app->bind(MemoCreateUseCaseInterface::class, MemoCreateInteractor::class);
        $this->app->bind(MemoQueryServiceInterface::class, MemoQueryService::class);
        $this->app->bind(MemoDeleteUseCaseInterface::class, MemoDeleteInteractor::class);
    }

    private function registerForTest()
    {
        $this->app->bind(MemoRepositoryInterface::class, MockMemoRepository::class);
        $this->app->bind(MemoCreateUseCaseInterface::class, MockMemoCreateInteractor::class);
    }
}
