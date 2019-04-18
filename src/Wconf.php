<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 19-4-18
 * Time: 上午8:38
 */

namespace wodrow\yii2wconf;


use wodrow\yii2wconf\models\WwConfig;

class Wconf extends WwConfig
{
    const VT_STR = 1;
    const VT_INT = 2;
    const VT_TEXT = 3;

    const STATUS_ACTIVE = 10;
    const STATUS_DEL = -10;

    public static function set($k, $v, $group = '')
    {
        $m = self::findOne(['k' => $k, 'group' => $group]);
        if (!$m){
            $m = new static();
            $m->k = $k;
            $m->group = $group;
            $m->v_type = self::VT_STR;
        }
        $m->status = self::STATUS_ACTIVE;
        $m->v = $v;
        return $m->save();
    }

    public static function get($k, $group = '')
    {
        $m = self::findOne(['k' => $k, 'group' => $group]);
        if (!$m){
            return null;
        }
        if ($m->status != self::STATUS_ACTIVE){
            return null;
        }
        return $m->v;
    }

    public static function del($k, $group = '')
    {
        $m = self::findOne(['k' => $k, 'group' => $group]);
        if ($m){
            $m->status = self::STATUS_DEL;
            return $m->save();
        }else{
            return true;
        }
    }
}