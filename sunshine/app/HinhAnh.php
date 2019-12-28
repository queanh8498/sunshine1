<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
        //chua day du, se them trong qua trinh lam

    public    $timestamps   = false; //created_at, updated_at
    protected $table        = 'hinhanh';
    protected $fillable     = ['ha_ten'];
    protected $guarded      = ['sp_ma', 'ha_stt'];
    protected $primaryKey   = ['sp_ma', 'ha_stt'];
    public    $incrementing = false; //do khóa 9 là cặp khóa nên cài false

    //them multi primary key de hinh trùng cungx k sao 
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }
        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }
        return $query;
    }
    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }
        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }
        return $this->getAttribute($keyName);
    }
}
