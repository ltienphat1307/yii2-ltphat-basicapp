<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180824_025205_user
 */
class m180824_025205_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180824_025205_user cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'email' => $this->string(45)->notNull()->unique(),
            'name' => $this->string(45),
            'password' => $this->string(45)->notNull(),
            'authKey' => $this->string(100)
        ]);
    }

    public function down()
    {
        echo "m180824_025205_user cannot be reverted.\n";

        return false;
    }
    
}
