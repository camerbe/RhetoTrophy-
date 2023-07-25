<?php
    namespace App\Repositories;
    use App\Models\EventTrackWorkshopBonusMalus;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use Exception;

    class EventTrackWorkshopBonusMalusRepository extends BaseRepository {
        public function __construct(EventTrackWorkshopBonusMalus $eventtrackWorkshopbonusmalus) {
            $this->model=$eventtrackWorkshopbonusmalus;
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
            
            try{
                parent::update($input, $oid);
                return $this->findById($oid);
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }

        }
        public function create(array $input){
            
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
            return EventTrackWorkshopBonusMalus::paginate();
         }

    }
