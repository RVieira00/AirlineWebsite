<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aeroportos".
 *
 * @property int $ID
 * @property string $Sigla
 * @property string $Nome
 *
 * @property Trajeto[] $trajetos
 * @property Trajeto[] $trajetos0
 */
class Aeroportos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aeroportos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Sigla', 'Nome'], 'required'],
            [['Sigla'], 'string', 'max' => 3],
            [['Nome'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Sigla' => 'Sigla',
            'Nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Trajetos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrajetos()
    {
        return $this->hasMany(Trajeto::className(), ['Destino_ID' => 'ID']);
    }

    /**
     * Gets query for [[Trajetos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrajetos0()
    {
        return $this->hasMany(Trajeto::className(), ['Origem_ID' => 'ID']);
    }


}
