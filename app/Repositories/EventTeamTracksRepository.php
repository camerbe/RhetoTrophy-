<?php
    namespace App\Repositories;
    use App\Models\EventTeamTrack;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use Exception;

    class EventTeamTracksRepository extends BaseRepository {
        public function __construct(EventTeamTrack $event) {
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
            return EventTeamTrack::orderBy('Start','desc')->paginate();
        }
        public function findByTrackOidAndTeamOid($TrackOid,$TeamOid){
            return EventTeamTrack::Where('TrackOid',$TrackOid)->where('TeamOid',$TeamOid)->get();
        }
    }
