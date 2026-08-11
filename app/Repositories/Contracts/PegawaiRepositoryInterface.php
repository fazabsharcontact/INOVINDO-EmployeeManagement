<?php

namespace App\Repositories\Contracts;

use Carbon\Carbon;
use App\Models\Pegawai;
use App\Models\User;
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

    public function paginate(
        ?string $jabatanFilter,
        ?string $search,
        int $perPage = 10
    ): LengthAwarePaginator;

    public function make(): Pegawai;

    public function loadUser(Pegawai $pegawai): Pegawai;

    public function createForUser(User $user, array $data): Pegawai;

    public function update(Pegawai $pegawai, array $data): bool;

    public function deleteRelatedUser(Pegawai $pegawai): int;
}