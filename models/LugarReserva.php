<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lugar_reserva".
 *
 * @property int $ID
 * @property int $Lugar_ID
 * @property int $Lugar_Aviao_ID
 * @property int $Reserva_ID
 * @property int $Reserva_Utilizador_ID
 *
 * @property Lugar $lugar
 * @property Reserva $reserva
 */
class LugarReserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lugar_reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Lugar_ID', 'Lugar_Aviao_ID', 'Reserva_ID', 'Reserva_Utilizador_ID'], 'required'],
            [['Lugar_ID', 'Lugar_Aviao_ID', 'Reserva_ID', 'Reserva_Utilizador_ID'], 'integer'],
            [['Lugar_ID', 'Lugar_Aviao_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Lugar::className(), 'targetAttribute' => ['Lugar_ID' => 'ID', 'Lugar_Aviao_ID' => 'Aviao_ID']],
            [['Reserva_ID', 'Reserva_Utilizador_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['Reserva_ID' => 'ID', 'Reserva_Utilizador_ID' => 'Utilizador_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Lugar_ID' => 'Lugar ID',
            'Lugar_Aviao_ID' => 'Lugar Aviao ID',
            'Reserva_ID' => 'Reserva ID',
            'Reserva_Utilizador_ID' => 'Reserva Utilizador ID',
        ];
    }

    /**
     * Gets query for [[Lugar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLugar()
    {
        return $this->hasOne(Lugar::className(), ['ID' => 'Lugar_ID', 'Aviao_ID' => 'Lugar_Aviao_ID']);
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['ID' => 'Reserva_ID', 'Utilizador_ID' => 'Reserva_Utilizador_ID']);
    }
}
