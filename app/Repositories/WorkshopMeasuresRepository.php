<?php
    namespace App\Repositories;
    use App\Models\WorkshopMeasure;
    use App\Repositories\BaseRepository;
    use Illuminate\Support\Str;
    use Exception;

    class WorkshopMeasuresRepository extends BaseRepository {
        public function __construct(WorkshopMeasure $workshopmeasure) {
            $this->model=$workshopmeasure;
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
            $input['ShortName']=Str::lower($input['ShortName']);
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
            $input['ShortName']=Str::lower($input['ShortName']);
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
            return WorkshopMeasure::orderBy('Name','asc')->paginate();
         }

    }
