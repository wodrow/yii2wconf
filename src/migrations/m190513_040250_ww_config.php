<?php

use yii\db\Schema;
use yii\db\Migration;

class m190513_040250_ww_config extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%ww_config}}',
            [
                'id'=> $this->bigPrimaryKey(20)->unsigned(),
                'k'=> $this->string(50)->notNull()->comment('键'),
                'v_type'=> $this->integer(11)->notNull(),
                'v'=> $this->text()->null()->defaultValue(null)->comment('值'),
                'group'=> $this->string(50)->null()->defaultValue(''),
                'status'=> $this->integer(11)->notNull(),
                'desc'=> $this->string(50)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('ww_config_kg_unique','{{%ww_config}}',['k','group'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('ww_config_kg_unique', '{{%ww_config}}');
        $this->dropTable('{{%ww_config}}');
    }
}
