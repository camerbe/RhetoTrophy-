<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    protected $eventrepository;

    public function __construct(EventRepository $eventrepository){
        $this->eventrepository=$eventrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $evts=$this->eventrepository->findAll();
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Liste des Events",

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

        $evts=$this->eventrepository->create($request->all());
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Insertion de l'Events",

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
        $evts=$this->eventrepository->findById($id);
        if($evts){
            return response()->json([
                "sucess"=>true,
                "data"=>$evts,
                "message"=>"Events trouvé",

            ],Response::HTTP_OK);
        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"Events inexistant ...",

            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request,$id)
    {
        //
        
        //dd($request->all());
        $evts=$this->eventrepository->update($request->except(['Oid']), $id);
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
    public function destroy($id)
    {
        //
        $evt=$this->eventrepository->delete($id);
        if($evt>0){
            return response()->json([
                "sucess"=>true,
                "message"=>"Suppression réussie",
            ],Response::HTTP_OK);

        }
        else{
            return response()->json([
                "sucess"=>false,
                "message"=>"Une erreur s'est produite...",
            ],Response::HTTP_NOT_FOUND);
        }
    }
}
