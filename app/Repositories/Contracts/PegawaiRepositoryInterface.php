<?php

namespace App\Repositories\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PegawaiRepositoryInterface
{
    public function getAllOrderedByName(): Collection;

    public function getWithoutGajiForPeriod(
        int|string $bulan,
        int|string $tahun,
        Carbon $tanggal
    ): Collection;

    public function findWithRelations(int|string $pegawaiId, array $relations): mixed;

    public function paginateWithCutiSummary(
        mixed $search,
        int $perPage = 10,
        string $pageName = 'pegawai_page'
    ): LengthAwarePaginator;
}