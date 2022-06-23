<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trajeto_reserva".
 *
 * @property int $ID
 * @property int $Reserva_ID
 * @property int $Trajeto_ID
 *
 * @property Reserva $reserva
 * @property Trajeto $trajeto
 */
class TrajetoReserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trajeto_reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Reserva_ID', 'Trajeto_ID'], 'required'],
            [['Reserva_ID', 'Trajeto_ID'], 'integer'],
            [['Reserva_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['Reserva_ID' => 'ID']],
            [['Trajeto_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Trajeto::className(), 'targetAttribute' => ['Trajeto_ID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Reserva_ID' => 'Reserva ID',
            'Trajeto_ID' => 'Trajeto ID',
        ];
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['ID' => 'Reserva_ID']);
    }

    /**
     * Gets query for [[Trajeto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrajeto()
    {
        return $this->hasOne(Trajeto::className(), ['ID' => 'Trajeto_ID']);
    }
}
