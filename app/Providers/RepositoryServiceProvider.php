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
use App\Repositories\Contracts\CutiRepositoryInterface;
use App\Repositories\Contracts\SisaCutiRepositoryInterface;
use App\Repositories\EloquentCutiRepository;
use App\Repositories\EloquentSisaCutiRepository;
use App\Repositories\Contracts\DashboardRepositoryInterface;
use App\Repositories\EloquentDashboardRepository;
use App\Repositories\Contracts\DivisiRepositoryInterface;
use App\Repositories\EloquentDivisiRepository;
use App\Repositories\Contracts\JabatanRepositoryInterface;
use App\Repositories\EloquentJabatanRepository;
use App\Repositories\Contracts\MasterPotonganRepositoryInterface;
use App\Repositories\EloquentMasterPotonganRepository;
use App\Repositories\Contracts\MeetingRepositoryInterface;
use App\Repositories\EloquentMeetingRepository;
use App\Repositories\Contracts\TransactionManagerInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\DatabaseTransactionManager;
use App\Repositories\EloquentUserRepository;
use App\Repositories\Contracts\PengumumanRepositoryInterface;
use App\Repositories\Contracts\PengumumanTargetRepositoryInterface;
use App\Repositories\EloquentPengumumanRepository;
use App\Repositories\EloquentPengumumanTargetRepository;
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
        CutiRepositoryInterface::class => EloquentCutiRepository::class,
        PegawaiRepositoryInterface::class => EloquentPegawaiRepository::class,
        SisaCutiRepositoryInterface::class => EloquentSisaCutiRepository::class,
        KehadiranRepositoryInterface::class => EloquentKehadiranRepository::class,
        JabatanRepositoryInterface::class => EloquentJabatanRepository::class,
        MasterPotonganRepositoryInterface::class => EloquentMasterPotonganRepository::class,
        PegawaiRepositoryInterface::class => EloquentPegawaiRepository::class,
        UserRepositoryInterface::class => EloquentUserRepository::class,
        JabatanRepositoryInterface::class => EloquentJabatanRepository::class,
        DivisiRepositoryInterface::class => EloquentDivisiRepository::class,
        TransactionManagerInterface::class => DatabaseTransactionManager::class,
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

        $this->app->bind(
            DashboardRepositoryInterface::class,
            EloquentDashboardRepository::class
        );

        $this->app->bind(
            DivisiRepositoryInterface::class,
            EloquentDivisiRepository::class
        );

        $this->app->bind(
            MeetingRepositoryInterface::class,
            EloquentMeetingRepository::class
        );

        $this->app->bind(
            PegawaiRepositoryInterface::class,
            EloquentPegawaiRepository::class
        );

        $this->app->bind(
            PengumumanRepositoryInterface::class,
            EloquentPengumumanRepository::class
        );

        $this->app->bind(
            PengumumanTargetRepositoryInterface::class,
            EloquentPengumumanTargetRepository::class
        );
    }

    public function boot(): void
    {
    }
}