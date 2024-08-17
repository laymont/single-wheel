<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRaffleRequest;
use App\Http\Requests\UpdateRaffleRequest;
use App\Http\Resources\RaffleResource;
use App\Models\Raffle;
use App\Repositories\Interfaces\RaffleRepositoryInterface;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    protected RaffleRepositoryInterface $raffleRepository;

    public function __construct(RaffleRepositoryInterface $raffleRepository)
    {
        $this->raffleRepository = $raffleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Inertia\Response
    {
        $raffles = $this->raffleRepository->all($request);
        $resource = RaffleResource::collection($raffles);
        return $this->sendInertiaResponse('Raffles/Index', [
            'resource' => $resource,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRaffleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $raffle = $this->raffleRepository->find($id);

        if (!$raffle) {
            abort(404);
        }

        return view('raffles.show', compact('raffle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Raffle $raffle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRaffleRequest $request, Raffle $raffle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raffle $raffle)
    {
        //
    }
}
