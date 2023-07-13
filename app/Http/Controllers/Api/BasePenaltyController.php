<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\BasePenaltyRepository;
use App\Models\BasePenalty;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class BasePenaltyController extends Controller
{
    protected $basepenaltyrepository;

    public function __construct(BasePenaltyRepository $basepenaltyrepository){
        $this->basepenaltyrepository=$basepenaltyrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workshop=$this->basepenaltyrepository->findAll();
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Liste des BasePenalty",

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
        $workshop=$this->basepenaltyrepository->create($request->all());
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"Insertion du BasePenalty",

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
        $workshop=$this->basepenaltyrepository->findById($id);
        if($workshop){
            return response()->json([
                "sucess"=>true,
                "data"=>$workshop,
                "message"=>"BasePenalty trouvé",

            ],Response::HTTP_FOUND);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"BasePenalty inexistant ...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $workshop=$this->basepenaltyrepository->update($request->except(['Oid']), $id);
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
        $workshop=$this->basepenaltyrepository->delete($id);
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
