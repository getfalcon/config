<?php
/**
 * @package    falcon
 * @author     Hryvinskyi Volodymyr <volodymyr@hryvinskyi.com>
 * @copyright  Copyright (c) 2018. Hryvinskyi Volodymyr
 * @version    0.0.1-alpha.0.1
 */

namespace falcon\config\models;

use Yii;
use yii\base\Event;

/**
 * This is the model class for table "{{%config_data}}".
 *
 * @property int    $config_id Config Id
 * @property string $path      Config Path
 * @property string $value     Config Value
 */
class ConfigData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%config_data}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'value'], 'required'],
            [['value'], 'string'],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'config_id' => Yii::t('app', 'Config Id'),
            'path' => Yii::t('app', 'Config Path'),
            'value' => Yii::t('app', 'Config Value'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $this->trigger(
            'config_changed_section_' . $this->getSection(),
            new Event(['data' => $this->toArray()])
        );
    }

    public function getSection()
    {

    }
}
