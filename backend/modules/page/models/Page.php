<?php

namespace backend\modules\page\models;

use common\components\CyrillicSlugBehavior;
use common\models\User;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property int|null $status
 * @property string|null $published_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $slug
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property PageLang[] $pageLangs
 */
class Page extends \yii\db\ActiveRecord
{
    const STATUS_SHOWED = 1;
    const STATUS_NOTSHOWED = 0;

    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'page';
    }
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
                    'title', 'content',
                ]
            ],
            'slug' => [
                'class' => CyrillicSlugBehavior::class,
                'attribute' => 'title',
            ],
            'blameable' => [
                'class' => BlameableBehavior::class,
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['published_at'], 'safe'],
            ['published_at','default', 'value' => new \yii\db\Expression("NOW()") ],
            [['slug','title'], 'string', 'max' => 255],
            [['slug','content'], 'string'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Holati',
            'published_at' =>"Yaratilgan vaqt",
            'created_by' => "Yaratdi",
            'updated_by' => "O'zgartirdi",
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[PageLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageLangs()
    {
        return $this->hasMany(PageLang::className(), ['owner_id' => 'id']);
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
