<?php

namespace backend\models;

use Yii;

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
    public static function tableName()
    {
        return 'leader';
    }

    public function rules()
    {
        return [
            [['status', 'category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['published_at'], 'safe'],
            [['phone'], 'string', 'max' => 21],
            [['email'], 'string', 'max' => 255],
            [['faks'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Leadercategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    public function setAttributeLabels()
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


    public function getCategory()
    {
        return $this->hasOne(Leadercategory::className(), ['id' => 'category_id']);
    }


    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }


    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }


    public function getLeaderLangs()
    {
        return $this->hasMany(LeaderLang::className(), ['owner_id' => 'id']);
    }

}
