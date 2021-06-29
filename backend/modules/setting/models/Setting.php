<?php

namespace backend\modules\setting\models;

use common\components\CyrillicSlugBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $phone
 * @property string $email
 * @property string $faks
 * @property int $status
 *
 * @property SettingLang[] $settingLangs
 */
class Setting extends \yii\db\ActiveRecord
{
    const STATUS_SHOWED = 1;
    const STATUS_NOTSHOWED = 0;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'en' => 'English',
                    'uz' => "O'zbek",
                    'ru'=>'Руский',
                ],
                'attributes' => [
                    'address',
                ]
            ],
        ];
    }
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'email', 'faks', 'status'], 'required'],
            [['status'], 'integer'],
            [['phone', 'faks'], 'string', 'max' => 21],
            [['email'], 'string', 'max' => 80],
            [['address'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Telefon',
            'email' => 'Email',
            'faks' => 'Faks',
            'status' => 'Holati',
            'address'=>'Manzil'
        ];
    }

    /**
     * Gets query for [[SettingLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettingLangs()
    {
        return $this->hasMany(SettingLang::className(), ['owner_id' => 'id']);
    }
    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }
    public  static function getstatus()
    {
        return[
            self::STATUS_SHOWED=>"Faol",
            self::STATUS_NOTSHOWED=>"Faol emasl",
        ];
    }
}
