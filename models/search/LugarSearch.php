<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lugar;

/**
 * LugarSearch represents the model behind the search form of `app\models\Lugar`.
 */
class LugarSearch extends Lugar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Aviao_ID'], 'integer'],
            [['Executiva'], 'safe'],
            [['PreçoMult'], 'number'],
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
        $query = Lugar::find();

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
            'ID' => $this->ID,
            'Aviao_ID' => $this->Aviao_ID,
            'PreçoMult' => $this->PreçoMult,
        ]);

        $query->andFilterWhere(['like', 'Executiva', $this->Executiva]);

        return $dataProvider;
    }

    public function findPlaneEcoSeats($planeID){
        $query = Lugar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'Aviao_ID' => $planeID,
        ]);

        $query->andFilterWhere([
            'Executiva' => 0,
        ]);

        $query->orderBy([
            'PreçoMult' => SORT_ASC,
        ]);

        return $dataProvider;
    }

    public function findPlaneExecSeats($planeID){
        $query = Lugar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'Aviao_ID' => $planeID,
        ]);

        $query->andFilterWhere([
            'Executiva' => 1,
        ]);

        $query->orderBy([
            'PreçoMult' => SORT_ASC,
        ]);

        return $dataProvider;
    }
}
