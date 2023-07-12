<?php
    namespace App\Repositories;
    use App\Models\EventTrack;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use Exception;

    class EventTracksRepository extends BaseRepository {
        public function __construct(EventTrack $event) {
            $this->model=$event;
        }
        public function findById($oid){
           return parent::findById($oid);
        }
        public function delete($oid){
            try{
                parent::delete($oid);
                return $this->findById($oid);
            }
            catch(Exception $e){
                return $e->getMessage();
            }

        }
        public function update(array $input, $oid){
            $input['Code']=Str::upper($input['Code']);
            $input['Name']=Str::title($input['Name']);
            try{
                parent::update($input, $oid);
                return $this->findById($oid);
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function create(array $input){
            $input['Code']=Str::upper($input['Code']);
            $input['Name']=Str::title($input['Name']);
            $uuid=(string) Str::uuid();
            $input['Oid']=$uuid;
            try{
                parent::create($input);
                return $this->findById($uuid);
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function findAll(){
            return EventTrack::orderBy('Name','asc')->paginate();
         }
    }
