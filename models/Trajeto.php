<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "trajeto".
 *
 * @property int $ID
 * @property int $Aviao_ID
 * @property string $Tempo_Extimado
 * @property string $PrecoTrajeto
 * @property string $Data
 * @property int $Destino_ID
 * @property int $Origem_ID
 *
 * @property Aeroportos $destino
 * @property Aeroportos $origem
 * @property Aviao $aviao
 * @property TrajetoReserva[] $trajetoReservas
 */
class Trajeto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trajeto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Aviao_ID', 'Tempo_Extimado', 'PrecoTrajeto', 'Data', 'Destino_ID', 'Origem_ID'], 'required'],
            [['Aviao_ID', 'Destino_ID', 'Origem_ID'], 'integer'],
            [['Tempo_Extimado', 'Data'], 'safe'],
            [['PrecoTrajeto'], 'string', 'max' => 45],
            [['Destino_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Aeroportos::className(), 'targetAttribute' => ['Destino_ID' => 'ID']],
            [['Origem_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Aeroportos::className(), 'targetAttribute' => ['Origem_ID' => 'ID']],
            [['Aviao_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Aviao::className(), 'targetAttribute' => ['Aviao_ID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Aviao_ID' => 'Aviao ID',
            'Tempo_Extimado' => 'Tempo Extimado',
            'PrecoTrajeto' => 'Preco Trajeto',
            'Data' => 'Data',
            'Destino_ID' => 'Destino ID',
            'Origem_ID' => 'Origem ID',
        ];
    }

    /**
     * Gets query for [[Destino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestino()
    {
        return $this->hasOne(Aeroportos::className(), ['ID' => 'Destino_ID']);
    }

    /**
     * Gets query for [[Origem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrigem()
    {
        return $this->hasOne(Aeroportos::className(), ['ID' => 'Origem_ID']);
    }

    /**
     * Gets query for [[Aviao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAviao()
    {
        return $this->hasOne(Aviao::className(), ['ID' => 'Aviao_ID']);
    }

    /**
     * Gets query for [[TrajetoReservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrajetoReservas()
    {
        return $this->hasMany(TrajetoReserva::className(), ['Trajeto_ID' => 'ID']);
    }

    public static function getAllAviaoArray(){
        $query=Aviao::find()
            ->orderBy([
                'ID' => SORT_ASC,
            ]);

        $items = $query->asArray()->all();$data=ArrayHelper::map($items, 'ID', 'Nome');
        return($data);
    }

    public static function getAllAeroportosArray(){
        $query=Aeroportos::find()
            ->orderBy([
                'ID' => SORT_ASC,
            ]);

        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'ID', 'Nome');
        return($data);
    }
}
