<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\WorkshopMeasuresRepository;
use Symfony\Component\HttpFoundation\Response;
class WorkshopMeasuresController extends Controller
{
    protected $workshopMeasuresrepository;

    public function __construct(WorkshopMeasuresRepository $workshopMeasuresrepository){
        $this->workshopMeasuresrepository=$workshopMeasuresrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workshop=$this->workshopMeasuresrepository->findAll();
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Liste des WorkshopMeasures",

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

        $workshop=$this->workshopMeasuresrepository->create($request->all());
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Insertion du WorkshopMeasures",

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
        $workshop=$this->workshopMeasuresrepository->findById($id);
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
        $workshop=$this->workshopMeasuresrepository->update($request->except(['Oid']), $id);
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
    public function destroy(string $id)
    {
        //
        $workshop=$this->workshopMeasuresrepository->delete($id);
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
