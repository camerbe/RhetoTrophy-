<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\EventTeamTrackWorkshopsRepository;
use App\Models\EventTeamTrackWorkshop;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventTeamTrackWorkshopController extends Controller
{
    protected $eventteamtrackWorkshopstepository;

    public function __construct(EventTeamTrackWorkshopsRepository $eventteamtrackWorkshopstepository){
        $this->eventteamtrackWorkshopstepository=$eventteamtrackWorkshopstepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workshop=$this->eventteamtrackWorkshopstepository->findAll();
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Liste des EventTeamTrackWorkshops",

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
        $workshop=$this->eventteamtrackWorkshopstepository->create($request->all());
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Insertion du EventTeamTrackWorkshops",

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
    public function show($id)
    {
        //
        $workshop=$this->eventteamtrackWorkshopstepository->findById($id);
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"EventTeamTrackWorkshops trouvé",

            ],Response::HTTP_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"EventTeamTrackWorkshops inexistant ...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $workshop=$this->eventteamtrackWorkshopstepository->update($request->except(['Oid']), $id);
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Mise à jour effectuée",

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
    public function destroy($id)
    {
        //
        $workshop=$this->eventteamtrackWorkshopstepository->delete($id);
        if($workshop){
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
