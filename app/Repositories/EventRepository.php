<?php
    namespace App\Repositories;
    use App\Models\Event;
    use App\Http\Resources\EventResource;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Str;

    use Exception;

    class EventRepository extends BaseRepository {
        public function __construct(Event $event) {
            $this->model=$event;
        }
        public function findById($oid){
            return new EventResource(parent::findById($oid)) ;
        }
        public function delete($oid){
            try{
                return parent::delete($oid);

            }
            catch(Exception $e){
                return $e->getMessage();
            }

        }
        public function update(array $input, $oid){
            dd($input);
            $input['Code']=Str::upper($input['Code']);
            $input['Name']=Str::title($input['Name']);
            try{
                parent::update($input, $oid);
                return new EventResource($this->findById($oid)) ;
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function create(array $input){
            // dd($input);
            //Log::debug($input);
            $input['Name']=Str::title($input['Name']);
            $input['Code']=Str::upper($input['Code']);
            $uuid=(string) Str::uuid();
            $input['Oid']=$uuid;
            try{
                parent::create($input);
                return new EventResource($this->findById($uuid));
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }


        }
        public function findAll(){
            $evt= Event::orderBy('Name','desc')->orderBy('Date','desc')->paginate();
            return EventResource::collection($evt);
         }
    }
