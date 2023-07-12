<?php
    namespace App\Repositories;
    use App\Models\EventTeam;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use App\Http\Resources\EventTeamsResource;
    use Exception;

    class EventTeamsRepository extends BaseRepository {
        public function __construct(EventTeam $event) {
            $this->model=$event;
        }
        public function findById($oid){
           return  new EventTeamsResource(parent::findById($oid)) ;
        }
        public function delete($oid){
            try{

                return  parent::delete($oid);;
            }
            catch(Exception $e){
                return $e->getMessage();
            }

        }
        public function update(array $input, $oid){
            $input['City']=Str::upper($input['City']);
            $input['Name']=Str::upper($input['Name']);;
            try{
                parent::update($input, $oid);
                return new EventTeamsResource($this->findById($oid));
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function create(array $input){
            $input['City']=Str::upper($input['City']);
            $input['Name']=Str::upper($input['Name']);
            $uuid=(string) Str::uuid();
            $input['Oid']=$uuid;
            try{
                parent::create($input);
                return new EventTeamsResource($this->findById($uuid)) ;
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function findAll(){
            $evt=EventTeam::orderBy('Name','asc')->paginate();
            return EventTeamsResource::collection($evt);
         }
    }
