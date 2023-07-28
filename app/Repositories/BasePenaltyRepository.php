<?php
    namespace App\Repositories;
    use App\Models\BasePenalty;
    use App\Http\Resources\EventResource;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Cache;

    use Exception;

    class BasePenaltyRepository extends BaseRepository {
        public function __construct(BasePenalty $event) {
            $this->model=$event;
        }
        public function findById($oid){
            return parent::findById($oid);
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
            
           if($basepenalty=Cache::get('basepenalty-list')){
                return $basepenalty;
            }
            $basepenalty=BasePenalty::orderBy('Oid','desc')->paginate();
            Cache::set('basepenalty-list',$basepenalty,Carbon::now()->addMinutes(60));
            return $basepenalty;
        }


    }
