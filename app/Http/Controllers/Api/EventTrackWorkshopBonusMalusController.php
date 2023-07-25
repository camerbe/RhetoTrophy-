<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\EventTrackWorkshopBonusMalusRepository;

class EventTrackWorkshopBonusMalusController extends Controller
{
    protected $eventtrackworkshopbonusmalusrepository;

    public function __construct(EventTrackWorkshopBonusMalusRepository $eventtrackworkshopbonusmalusrepository){
        $this->eventtrackworkshopbonusmalusrepository=$eventtrackworkshopbonusmalusrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $evts=$this->eventtrackworkshopbonusmalusrepository->findAll();
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Liste des EventTrackWorkshopBonusMalus",

            ],Response::HTTP_CREATED);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"Une erreur s'est produite...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $evts=$this->eventtrackworkshopbonusmalusrepository->create($request->all());
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Insertion de l'EventTrackWorkshopBonusMalus",

            ],Response::HTTP_CREATED);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"Une erreur s'est produite...",

            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $evts=$this->eventtrackworkshopbonusmalusrepository->findById($id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"EventTrackWorkshopBonusMalus trouvé",

            ],Response::HTTP_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"EventTrackWorkshopBonusMalus inexistant ...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $evts=$this->eventtrackworkshopbonusmalusrepository->update($request->except(['Oid']), $id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Mise à effectuée",

            ],Response::HTTP_OK);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"Echec de la mise à jour ...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $evt=$this->eventtrackworkshopbonusmalusrepository->delete($id);
        if($evt<=0){
            return response()->json([
                "sucess"=>false,
                "message"=>"Une erreur s'est produite...",

            ],Response::HTTP_NOT_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>true,
                "message"=>"Suppression réussie",

            ],Response::HTTP_OK);
        }
    }
}
