<?php

namespace backend\modules\leader\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\leader\models\Leader;

/**
 * LeaderSearch represents the model behind the search form of `backend\modules\leader\models\Leader`.
 */
class LeaderSearch extends Leader
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['phone', 'email', 'faks', 'published_at','name','position','activity'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Leader::find()->joinWith('translation');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'published_at' => $this->published_at,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);
        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'leader_lang.name', $this->name])
            ->andFilterWhere(['like', 'leader_lang.position', $this->position])
            ->andFilterWhere(['like', 'leader_lang.activity', $this->activity])
            ->andFilterWhere(['like', 'faks', $this->faks]);
        return $dataProvider;
    }
}
