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
    const VT_INT = 1;
    const VT_STR = 2;
    const VT_TEXT = 3;

    const STATUS_ACTIVE = 10;
}