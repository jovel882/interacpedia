<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];    
    protected $guarded = ['id'];
    protected $appends = array('full_name');
    /**
    * Trae el nombre completo.
    *
    * @return string
    */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }    
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
    public function getById($id,$withTrash=false){
        $query=$this->with('company')->where("id",$id);
        if($withTrash){
            $query->withTrashed();
        }
        return $query->first();
    }
    public function getAll($paginate=false,$withTrash=false){
        $query=$this->with('company');
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
            $this->delete();
            return true;
        } catch (\Illuminate\Database\QueryException $exception) {
            return false;  
        }
    }            
}
