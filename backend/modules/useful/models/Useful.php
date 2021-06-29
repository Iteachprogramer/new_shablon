<?php

namespace backend\modules\useful\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "useful".
 *
 * @property int $id
 * @property string $img
 * @property string $url
 * @property int|null $status
 *
 * @property UsefulLang[] $usefulLangs
 */
class Useful extends \yii\db\ActiveRecord
{
    const STATUS_SHOWED = 1;
    const STATUS_NOTSHOWED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'useful';
    }

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
                    'title',
                ]
            ],
        ];
    }
    public function rules()
    {
        return [
            [['img', 'url'], 'required'],
            [['status'], 'integer'],
            [['img', 'url','title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'url' => 'Url',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[UsefulLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsefulLangs()
    {
        return $this->hasMany(UsefulLang::className(), ['owner_id' => 'id']);
    }
    public  static function getstatus()
    {
        return[
            self::STATUS_SHOWED=>"Faol",
            self::STATUS_NOTSHOWED=>"Faol emasl",
        ];
    }
    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }
}
