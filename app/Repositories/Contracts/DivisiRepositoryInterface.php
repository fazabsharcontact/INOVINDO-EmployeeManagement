<?php

namespace App\Repositories\Contracts;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Collection;

interface DivisiRepositoryInterface
{
    public function create(array $attributes): Divisi;

    public function update(Divisi $divisi, array $attributes): bool;

    public function countTeams(Divisi $divisi): int;

    public function delete(Divisi $divisi): bool;
    
    public function getAllWithTims(): Collection;
}