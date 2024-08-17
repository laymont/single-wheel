<?php

namespace App\Repositories\Interfaces;

use App\Models\Raffle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface RaffleRepositoryInterface
{
    public function all(Request $request): LengthAwarePaginator;

    public function find(int $id): ?Raffle;

    public function create(array $data): Raffle;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
