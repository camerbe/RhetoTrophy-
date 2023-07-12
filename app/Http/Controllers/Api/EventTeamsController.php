<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EventTeamsRepository;
use Symfony\Component\HttpFoundation\Response;

class EventTeamsController extends Controller
{
    protected $eventteamsrepository;

    public function __construct(EventTeamsRepository $eventteamsrepository){
        $this->eventteamsrepository=$eventteamsrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $evts=$this->eventteamsrepository->findAll();
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Liste des EventTeams",

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
        $evts=$this->eventteamsrepository->create($request->all());
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Insertion de l'EventTeams",

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
        $evts=$this->eventteamsrepository->findById($id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"EventTeams trouvé",

            ],Response::HTTP_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"EventTeams inexistant ...",

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
        $evts=$this->eventteamsrepository->update($request->except(['Oid']), $id);
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
        $evt=$this->eventteamsrepository->delete($id);
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
