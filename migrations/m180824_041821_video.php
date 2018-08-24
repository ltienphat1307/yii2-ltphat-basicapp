<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180824_041821_video
 */
class m180824_041821_video extends Migration
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
        echo "m180824_041821_video cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('video', [
            'id' => Schema::TYPE_PK,
            'user_id' => $this->integer()->notNull(),
            'video_url' => $this->string(100),
            'title' => $this->string(100),
            'comment' => $this->string(200)
        ]);

        $this->createIndex(
            'idx-video-user_id',
            'video',
            'user_id'
        );

        $this->addForeignKey(
            'fk-video-user_id',
            'video',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m180824_041821_video cannot be reverted.\n";

        return false;
    }
    
}
