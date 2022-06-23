<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lugar".
 *
 * @property int $ID
 * @property int $Aviao_ID
 * @property string $Executiva
 * @property float $PreçoMult
 *
 * @property Aviao $aviao
 * @property LugarReserva[] $lugarReservas
 */
class Lugar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lugar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Aviao_ID', 'Executiva', 'PreçoMult'], 'required'],
            [['Aviao_ID'], 'integer'],
            [['PreçoMult'], 'number'],
            [['Executiva'], 'string', 'max' => 1],
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
            'Executiva' => 'Executiva',
            'PreçoMult' => 'Preço Mult',
        ];
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
     * Gets query for [[LugarReservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLugarReservas()
    {
        return $this->hasMany(LugarReserva::className(), ['Lugar_ID' => 'ID', 'Lugar_Aviao_ID' => 'Aviao_ID']);
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
