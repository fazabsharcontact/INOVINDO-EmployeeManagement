<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Models\User;
use App\Repositories\Contracts\PegawaiRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentPegawaiRepository implements PegawaiRepositoryInterface
{
    public function getAllOrderedByName(): Collection
    {
        return Pegawai::orderBy('nama')->get();
    }

    public function getWithoutGajiForPeriod(
        int|string $bulan,
        int|string $tahun,
        Carbon $tanggal
    ): Collection {
        return Pegawai::where('tanggal_masuk', '<=', $tanggal)
            ->whereDoesntHave('gajis', function ($query) use ($bulan, $tahun) {
                $query->where('bulan', $bulan)
                    ->where('tahun', $tahun);
            })
            ->with('jabatan')
            ->orderBy('nama')
            ->get();
    }

    public function findWithRelations(int|string $pegawaiId, array $relations): mixed
    {
        return Pegawai::with($relations)->find($pegawaiId);
    }

    public function paginateWithCutiSummary(
        mixed $search,
        int $perPage = 10,
        string $pageName = 'pegawai_page'
    ): LengthAwarePaginator {
        return Pegawai::with(['jabatan', 'sisaCuti'])
            ->when(
                $search,
                fn ($builder) => $builder->where('nama', 'like', "%{$search}%")
            )
            ->orderBy('nama')
            ->paginate($perPage, ['*'], $pageName);
    }

    public function paginate(
        ?string $jabatanFilter,
        ?string $search,
        int $perPage = 10
    ): LengthAwarePaginator {
        return Pegawai::with('jabatan', 'user', 'tim.divisi')
            ->when(
                $jabatanFilter,
                fn ($query) => $query->whereHas(
                    'jabatan',
                    fn ($jabatanQuery) => $jabatanQuery->where(
                        'nama_jabatan',
                        $jabatanFilter
                    )
                )
            )
            ->when(
                $search,
                fn ($query) => $query->where(
                    'nama',
                    'like',
                    "%{$search}%"
                )
            )
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function make(): Pegawai
    {
        return new Pegawai();
    }

    public function loadUser(Pegawai $pegawai): Pegawai
    {
        return $pegawai->load('user');
    }

    public function createForUser(User $user, array $data): Pegawai
    {
        return $user->pegawai()->create($data);
    }

    public function update(Pegawai $pegawai, array $data): bool
    {
        return $pegawai->update($data);
    }

    public function deleteRelatedUser(Pegawai $pegawai): int
    {
        return $pegawai->user()->delete();
    }
}