<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SvcEquipItems extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'svc_equip_id', 'item_category_id', 'name', 'desc',
        'exec_command', 'require_parameters',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'require_parameters' => 'array',
    ];

    /**
     * Get associated fields
     * 
     * @return void
     */
    public function access_statuses()
    {
        return $this->hasMany('App\AccessStatus', 'svcequipitem_id');
    }

    public function svc_equip()
    {
        return $this->belongsTo('App\SvcEquip', 'svc_equip_id')->withDefault();
    }

    public function svc_equip_category()
    {
        return $this->belongsTo('App\SvcEquipCategory', 'item_category_id')->withDefault();
    }

    public function is_accessright_item()
    {
        $this->load('svc_equip.svc_equiptype');
        return $this->svc_equip->svc_equiptype->is_accessright === 1;
    }
}
