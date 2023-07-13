<?php

namespace App\Http\Controllers\Api;

use App\Models\EventTeamTrack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventTeamTracksRepository;
use Symfony\Component\HttpFoundation\Response;
class EventTeamTrackController extends Controller
{

    protected $eventteamtracksRepository;

    public function __construct(EventTeamTracksRepository $eventteamtracksRepository){
        $this->eventteamtracksRepository=$eventteamtracksRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $evts=$this->eventteamtracksRepository->findAll();
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Liste des EventTeamTracks",

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
        $evts=$this->eventteamtracksRepository->create($request->all());
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Insertion de l'EventTeamTracks",

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
        $evts=$this->eventteamtracksRepository->findById($id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"EventTeamTracks trouvé",

            ],Response::HTTP_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"EventTracks inexistant ...",

            ],Response::HTTP_NOT_FOUND);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $evts=$this->eventteamtracksRepository->update($request->except(['Oid']), $id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
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
        $evt=$this->eventteamtracksRepository->delete($id);
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
