<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lugarreserva;

/**
 * LugarreservaSearch represents the model behind the search form of `app\models\Lugarreserva`.
 */
class LugarreservaSearch extends Lugarreserva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Lugar_ID', 'Lugar_Aviao_ID', 'Reserva_ID', 'Reserva_Utilizador_ID'], 'integer'],
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
        $query = Lugarreserva::find();

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
            'Lugar_ID' => $this->Lugar_ID,
            'Lugar_Aviao_ID' => $this->Lugar_Aviao_ID,
            'Reserva_ID' => $this->Reserva_ID,
            'Reserva_Utilizador_ID' => $this->Reserva_Utilizador_ID,
        ]);

        return $dataProvider;
    }
}
