<?php

namespace App\Http\Controllers\Api;

use App\Repositories\EventTracksRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventTracksController extends Controller
{
    protected $eventtracksrepository;


    public function __construct(EventTracksRepository $eventtracksrepository){
        $this->eventtracksrepository=$eventtracksrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $evts=$this->eventtracksrepository->findAll();
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Liste des EventTracks",

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $evts=$this->eventtracksrepository->create($request->all());
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Insertion de l'EventTracks",

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
        $evts=$this->eventtracksrepository->findById($id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"EventTracks trouvé",

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $evts=$this->eventtracksrepository->update($request->except(['Oid']), $id);
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
        $evt=$this->eventtracksrepository->delete($id);
        if($evt){
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
