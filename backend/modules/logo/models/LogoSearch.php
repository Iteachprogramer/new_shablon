<?php

namespace backend\modules\logo\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\logo\models\Logo;

/**
 * LogoSearch represents the model behind the search form of `backend\modules\logo\models\Logo`.
 */
class LogoSearch extends Logo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['img','title','subtitle'], 'safe'],
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
        $query = Logo::find()->joinWith('translation');
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
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'logo_lang.title', $this->title])
            ->andFilterWhere(['like', 'logo_lang.subtitle', $this->subtitle]);
        return $dataProvider;
    }
}
