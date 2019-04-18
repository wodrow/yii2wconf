<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 19-4-17
 * Time: 下午4:03
 */

namespace wodrow\yii2wconf\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%ww_config}}".
 *
 * @property int $id
 * @property string $k
 * @property int $v_type
 * @property string $v
 * @property string $group
 * @property int $status
 */
class WwConfig extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ww_config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['k', 'v_type', 'status'], 'required'],
            [['v_type', 'status'], 'integer'],
            [['v'], 'string'],
            [['k', 'group'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'k' => Yii::t('app', 'K'),
            'v_type' => Yii::t('app', 'V Type'),
            'v' => Yii::t('app', 'V'),
            'group' => Yii::t('app', 'Group'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}