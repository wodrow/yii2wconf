<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 19-4-17
 * Time: 下午4:03
 */

namespace wodrow\yii2wconf\models;

use Yii;

/**
 * This is the model class for table "{{%ww_config}}".
 *
 * @property string $id
 * @property string $k 键
 * @property int $v_type
 * @property string $v 值
 * @property string $group
 * @property int $status
 * @property string $desc
 * @property int $created_at
 * @property int $updated_at
 */
class WwConfig extends \yii\db\ActiveRecord
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
            [['k', 'v_type', 'status', 'created_at', 'updated_at'], 'required'],
            [['v_type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['v'], 'string'],
            [['k', 'group', 'desc'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'k' => Yii::t('app', '键'),
            'v_type' => Yii::t('app', 'V Type'),
            'v' => Yii::t('app', '值'),
            'group' => Yii::t('app', 'Group'),
            'status' => Yii::t('app', 'Status'),
            'desc' => Yii::t('app', 'Desc'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}