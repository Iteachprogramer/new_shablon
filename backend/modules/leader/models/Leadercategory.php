<?php

namespace backend\modules\leader\models;

use common\components\CyrillicSlugBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "leadercategory".
 *
 * @property int $id
 * @property string|null $slug
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 *
 * @property Leader[] $leaders
 * @property LeadercategoryLang[] $leadercategoryLangs
 */
class Leadercategory extends \soft\db\ActiveRecord
{
    const STATUS_SHOWED = 1;
    const STATUS_NOTSHOWED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leadercategory';
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
                    'ru' => "Руский",
                    'uz' => "O'zbek",
                ],
                'attributes' => [
                    'title',
                ]
            ],
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
            'slug' => [
                'class' => CyrillicSlugBehavior::class,
                'attribute' => 'title',
            ]
        ];
    }

    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['title'], 'string'],
            [['title'], 'required'],
            [['slug'], 'string', 'max' => 127],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'created_at' => "Yaratildi",
            'updated_at' => "O'zgartirildi",
            'status' => 'Holati',
        ];
    }

    /**
     * Gets query for [[Leaders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeaders()
    {
        return $this->hasMany(Leader::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[LeadercategoryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeadercategoryLangs()
    {
        return $this->hasMany(LeadercategoryLang::className(), ['owner_id' => 'id']);
    }
    public static function find()
    {
        return parent::find()->multilingual();
    }
    public  static function getstatus()
    {
        return[
            self::STATUS_SHOWED=>"Faol",
            self::STATUS_NOTSHOWED=>"Faol emasl",
        ];
    }
}
