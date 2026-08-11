<?php

namespace App\Providers;

use App\Repositories\Contracts\GajiReferenceRepositoryInterface;
use App\Repositories\Contracts\GajiRepositoryInterface;
use App\Repositories\Contracts\PegawaiRepositoryInterface;
use App\Repositories\EloquentGajiReferenceRepository;
use App\Repositories\EloquentGajiRepository;
use App\Repositories\EloquentPegawaiRepository;
use App\Repositories\Contracts\GajiMassalRepositoryInterface;
use App\Repositories\EloquentGajiMassalRepository;
use App\Repositories\Contracts\LaporanPerformaRepositoryInterface;
use App\Repositories\EloquentLaporanPerformaRepository;
use App\Repositories\Contracts\KehadiranRepositoryInterface;
use App\Repositories\EloquentKehadiranRepository;
use App\Repositories\Contracts\AdminTugasRepositoryInterface;
use App\Repositories\EloquentAdminTugasRepository;
use App\Repositories\Contracts\TugasPengumpulanRepositoryInterface;
use App\Repositories\EloquentTugasPengumpulanRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        GajiRepositoryInterface::class => EloquentGajiRepository::class,
        PegawaiRepositoryInterface::class => EloquentPegawaiRepository::class,
        GajiReferenceRepositoryInterface::class => EloquentGajiReferenceRepository::class,
        GajiMassalRepositoryInterface::class => EloquentGajiMassalRepository::class,
        KehadiranRepositoryInterface::class => EloquentKehadiranRepository::class,
        AdminTugasRepositoryInterface::class => EloquentAdminTugasRepository::class,
    ];

    public function register(): void
    {
        $this->app->bind(
            LaporanPerformaRepositoryInterface::class,
            EloquentLaporanPerformaRepository::class
        );

        $this->app->bind(
            TugasPengumpulanRepositoryInterface::class,
            EloquentTugasPengumpulanRepository::class
        );
    }

    public function boot(): void
    {
    }
}