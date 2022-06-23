<?php


namespace app\models\search;
use Yii2;

use app\models\Aeroportos;
use app\models\Trajeto;
use yii\data\ActiveDataProvider;

class VoosSearch
{

    public function getFlightInfoByID($id){
        $query = Trajeto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andWhere(['ID' => $id]);
        return $dataProvider;
    }

    public function getFlightInfoAsArray($origem, $destino, $data)
    {
        $query = Trajeto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        $origemID = Aeroportos::find()
            ->select("ID")
            ->where("Nome = '$origem'")
            ->asArray()
            ->one();

        $destinoID = Aeroportos::find()
            ->select("ID")
            ->where("Nome = '$destino'")
            ->asArray()
            ->one();

        $query->andWhere(['Origem_ID' => $origemID]);
        $query->andWhere(['Destino_ID' =>$destinoID]);
        $query->andFilterWhere(['like', 'data', $data]);

        return $dataProvider;
    }

}