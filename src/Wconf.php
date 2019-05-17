<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 19-4-18
 * Time: 上午8:38
 */

namespace wodrow\yii2wconf;


use wodrow\yii2wconf\models\WwConfig;
use yii\base\Component;

class Wconf extends Component
{
    public static function set($k, $v, $group = '', $vt = WwConfig::VT_STR)
    {
        $m = WwConfig::findOne(['k' => $k, 'group' => $group]);
        if (!$m){
            $m = new static();
            $m->k = $k;
            $m->group = $group;
            $m->v_type = $vt;
            $m->created_at = time();
        }
        $m->status = WwConfig::STATUS_ACTIVE;
        $m->v = (string)$v;
        $m->updated_at = time();
        return $m->save();
    }

    public static function get($k, $group = '')
    {
        $m = WwConfig::findOne(['k' => $k, 'group' => $group]);
        if (!$m){
            return null;
        }
        if ($m->status != WwConfig::STATUS_ACTIVE){
            return null;
        }
        switch ($m->v_type){
            case WwConfig::VT_INT:
                $m->v = (integer)$m->v;
                break;
            default:
                $m->v = (string)$m->v;
                break;
        }
        return $m->v;
    }

    public static function del($k, $group = '')
    {
        $m = WwConfig::findOne(['k' => $k, 'group' => $group]);
        if ($m){
            $m->status = WwConfig::STATUS_DEL;
            return $m->save();
        }else{
            return true;
        }
    }
}