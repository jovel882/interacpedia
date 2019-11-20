<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\CreateCompany;

class Company extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];    
    protected $guarded = ['id'];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => CreateCompany::class,
    ];     
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
    public function getById($id,$withTrash=false){
        $query=$this->where("id",$id);
        if($withTrash){
            $query->withTrashed();
        }
        return $query->first();
    }
    public function getAll($paginate=false,$withTrash=false){
        $query=$this;
        if($withTrash){
            $query=$query->withTrashed();
        }
        if($paginate){
            return $query->paginate(config('page.quantityPerPage'));
        }
        return $query->get();
    }
    public function store($data){
        try {
            return $this->create($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            return false;  
        }
    }    
    public function edit($data){
        try {
            return $this->fill($data)->save();
        } catch (\Illuminate\Database\QueryException $exception) {
            return false;  
        }
    }    
    public function remove(){
        try {
            $this->employees()->delete();
            $this->delete();
            return true;
        } catch (\Illuminate\Database\QueryException $exception) {
            return false;  
        }
    }    
}
