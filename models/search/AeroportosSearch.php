<?php

namespace app\models\search;

use app\models\Trajeto;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aeroportos;

/**
 * AeroportosSearch represents the model behind the search form of `app\models\Aeroportos`.
 */
class AeroportosSearch extends Aeroportos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Sigla', 'Nome'], 'safe'],
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
        $query = Aeroportos::find();

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
        ]);

        $query->andFilterWhere(['like', 'Sigla', $this->Sigla])
            ->andFilterWhere(['like', 'Nome', $this->Nome]);

        return $dataProvider;
    }

    public static function returnName($id){
        $query = Aeroportos::find();
        $id = intval($id);
        //$this->load($params);

        echo "working";

        return Aeroportos::find()
            ->select("Nome")
            ->where("ID = '$id'")
            ->one();


    }
}
