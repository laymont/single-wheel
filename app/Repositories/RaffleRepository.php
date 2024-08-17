<?php

namespace App\Repositories;

use App\Models\Raffle;
use App\Repositories\Interfaces\RaffleRepositoryInterface;
use App\Traits\HandlePerPageTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RaffleRepository implements RaffleRepositoryInterface
{
    use HandlePerPageTrait;
    protected Raffle $model;

    public function __construct(Raffle $raffle)
    {
        $this->model = $raffle;
    }

    public function all(Request $request): LengthAwarePaginator
    {
        $perPage = $this->getPerPage($request);
        return $this->model::orderByDesc('id')
            ->when($request->filled('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('prize', 'like', "%{$search}%");
            })
            ->when($request->filled('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->paginate($perPage)
            ->withQueryString();
    }

    public function find(int $id): ?Raffle
    {
        return $this->model::find($id);
    }

    public function create(array $data): Raffle
    {
        return $this->model::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $raffle = $this->find($id);
        return $raffle && $raffle->update($data);
    }

    public function delete(int $id): bool
    {
        $raffle = $this->find($id);
        return $raffle ? $raffle->delete() : false;
    }
}
