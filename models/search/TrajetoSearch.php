<?php

namespace app\models\search;

use app\models\Aviao;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trajeto;

/**
 * TrajetoSearch represents the model behind the search form of `app\models\Trajeto`.
 */
class TrajetoSearch extends Trajeto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Aviao_ID', 'Destino_ID', 'Origem_ID'], 'integer'],
            [['Tempo_Extimado', 'PrecoTrajeto', 'Data'], 'safe'],
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
        $query = Trajeto::find();

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
            'Tempo_Extimado' => $this->Tempo_Extimado,
            'Data' => $this->Data,
            'Destino_ID' => $this->Destino_ID,
            'Origem_ID' => $this->Origem_ID,
        ]);

        $query->andFilterWhere(['like', 'PrecoTrajeto', $this->PrecoTrajeto]);

        return $dataProvider;
    }

    public function getAviaoID($id){
        //id é o id do trajeto, queremos o id do avião a partir do id do trajeto
        $query = Trajeto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->select(["Aviao_ID"]);
        $query->where(["ID"=> $id]);

        return $dataProvider;
    }
}
