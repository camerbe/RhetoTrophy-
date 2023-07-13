<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\EventPenaltiesRepository;
use App\Models\EventPenalties;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventPenaltiesController extends Controller
{
    protected $eventpenaltiesrepository;

    public function __construct(EventPenaltiesRepository $eventpenaltiesrepository){
        $this->eventpenaltiesrepository=$eventpenaltiesrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workshop=$this->eventpenaltiesrepository->findAll();
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Liste des EventPenalties",

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
        $workshop=$this->eventpenaltiesrepository->create($request->all());
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Insertion de l'EventPenalties",

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
        $workshop=$this->eventpenaltiesrepository->findById($id);
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"WorkshopMeasures trouvé",

            ],Response::HTTP_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"WorkshopMeasures inexistant ...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $workshop=$this->eventpenaltiesrepository->update($request->except(['Oid']), $id);
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
        $workshop=$this->eventpenaltiesrepository->delete($id);
        if($workshop<=0){
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
