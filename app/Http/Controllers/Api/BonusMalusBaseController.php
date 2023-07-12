<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\BonusMalusBaseRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Models\BonusMalusBase;
use Illuminate\Http\Request;

class BonusMalusBaseController extends Controller
{
    protected $bonusmalusbaserepository;

    public function __construct(BonusMalusBaseRepository $bonusmalusbaserepository){
        $this->bonusmalusbaserepository=$bonusmalusbaserepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BonusMalusBase $bonusMalusBase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BonusMalusBase $bonusMalusBase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonusMalusBase $bonusMalusBase)
    {
        //
    }
}
