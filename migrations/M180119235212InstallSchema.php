<?php
/**
 * @package    falcon
 * @author     Hryvinskyi Volodymyr <volodymyr@hryvinskyi.com>
 * @copyright  Copyright (c) 2018. Hryvinskyi Volodymyr
 * @version    0.0.1-alpha.0.1
 */

namespace falcon\config\migrations;

use yii\db\Migration;

/**
 * Class M180119235212InstallSchema
 */
class M180119235212InstallSchema extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%config_data}}', [
            'config_id' => $this->primaryKey()->comment('Config Id'),
            'path' => $this->string(255)->notNull()->comment('Config Path'),
            'value' => $this->text()->notNull()->notNull()->comment('Config Value'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%config_data}}');
    }
}
