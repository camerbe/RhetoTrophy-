<?php
    namespace App\Repositories;
    use App\Models\EventTrackWorkshop;
    use App\Models\EventTrack;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use Exception;

    class EventTrackWorkshopRepository extends BaseRepository {
        public function __construct(EventTrackWorkshop $eventtrackworkshop) {
            $this->model=$eventtrackworkshop;
        }
        public function findById($oid){
            return parent::findById($oid);
        }
        public function delete($oid){
            try{
                parent::delete($oid);
                return $this->findById($oid);
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function update(array $input, $oid){
            $input['Code']=Str::upper($input['Code']);
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
            return EventTrackWorkshop::orderBy('Name','asc')->paginate();
         }

        public function findByCode($code){
            //return EventTrackWorkshop::With['eventtrack']->get();
           
            return EventTrackWorkshop::orderBy('EventTrackWorkshops.SEQ','asc')
                    ->join('EventTracks','EventTracks.Oid','=','EventTrackWorkshops.EventTrackOid')
                    ->where('EventTracks.Code',$code)
                    ->select('EventTrackWorkshops.*')
                    ->get();
            
        }
            

    }
