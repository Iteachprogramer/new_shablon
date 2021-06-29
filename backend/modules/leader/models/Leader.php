<?php

namespace backend\modules\leader\models;

use common\components\CyrillicSlugBehavior;
use common\models\User;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "leader".
 *
 * @property int $id
 * @property int|null $status
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $faks
 * @property string|null $published_at
 * @property int|null $category_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Leadercategory $category
 * @property User $createdBy
 * @property User $updatedBy
 * @property LeaderLang[] $leaderLangs
 */
class Leader extends \soft\db\ActiveRecord
{
    const STATUS_SHOWED = 1;
    const STATUS_NOTSHOWED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leader';
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
                    'name', 'position','activity','biography','reception_days',
                ]
            ],
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
            'blameable' => [
                'class' => BlameableBehavior::class,
            ],
        ];
    }

    public function rules()
    {
        return [
            [['status', 'category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['published_at'], 'safe'],
            ['published_at','default', 'value' => new \yii\db\Expression("NOW()") ],
            [['phone'], 'string', 'max' => 21],
            [['email','position',  'name','reception_days',], 'string', 'max' => 255],
            [['faks'], 'string', 'max' => 50],
            [['activity','biography',], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Leadercategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'status' => 'Status',
            'phone' => 'Phone',
            'email' => 'Email',
            'faks' => 'Faks',
            'published_at' => 'Published At',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Leadercategory::className(), ['id' => 'category_id']);
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
     * Gets query for [[LeaderLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeaderLangs()
    {
        return $this->hasMany(LeaderLang::className(), ['owner_id' => 'id']);
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
