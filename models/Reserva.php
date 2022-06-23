<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "reserva".
 *
 * @property int $ID
 * @property int $Utilizador_ID
 *
 * @property LugarReserva[] $lugarReservas
 * @property User $utilizador
 * @property TrajetoReserva[] $trajetoReservas
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Utilizador_ID'], 'required'],
            [['Utilizador_ID'], 'integer'],
            [['Utilizador_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Utilizador_ID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Utilizador_ID' => 'Utilizador ID',
        ];
    }

    /**
     * Gets query for [[LugarReservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLugarReservas()
    {
        return $this->hasMany(LugarReserva::className(), ['Reserva_ID' => 'ID', 'Reserva_Utilizador_ID' => 'Utilizador_ID']);
    }

    /**
     * Gets query for [[Utilizador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(User::className(), ['id' => 'Utilizador_ID']);
    }

    /**
     * Gets query for [[TrajetoReservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrajetoReservas()
    {
        return $this->hasMany(TrajetoReserva::className(), ['Reserva_ID' => 'ID']);
    }

    public static function getAllAsArray(){
        $query=Aviao::find()
            ->orderBy([
                'ID' => SORT_ASC,
            ]);

        $items = $query->asArray()->all();$data=ArrayHelper::map($items, 'ID', 'Nome');
        return($data);
    }


}
