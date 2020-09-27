<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Domain\Application\Memo\MemoDeleteInteractor;
use packages\Domain\Application\Memo\MemoDetailInteractor;
use packages\Domain\Application\Memo\MemoIndexInteractor;
use packages\Domain\Application\Memo\MemoUpdateInteractor;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use packages\Infrastructure\Memo\MemoQueryService;
use packages\Infrastructure\Memo\MemoRepository;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;
use packages\UseCase\Memo\Delete\MemoDeleteUseCaseInterface;
use packages\UseCase\Memo\Index\MemoIndexUseCaseInterface;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;
use packages\UseCase\Memo\Show\MemoDetailUseCaseInterface;
use packages\UseCase\Memo\Update\MemoUpdateUseCaseInterface;

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
        $this->app->bind(MemoQueryServiceInterface::class, MemoQueryService::class);
        $this->app->bind(MemoIndexUseCaseInterface::class, MemoIndexInteractor::class);
        $this->app->bind(MemoDetailUseCaseInterface::class, MemoDetailInteractor::class);
        $this->app->bind(MemoCreateUseCaseInterface::class, MemoCreateInteractor::class);
        $this->app->bind(MemoDeleteUseCaseInterface::class, MemoDeleteInteractor::class);
        $this->app->bind(MemoUpdateUseCaseInterface::class, MemoUpdateInteractor::class);
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
