<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aviao".
 *
 * @property int $ID
 * @property string $Nome
 * @property string $Lugares
 * @property int $Lugares_eco
 * @property int $Lugares_exec
 *
 * @property Lugar[] $lugars
 * @property Trajeto[] $trajetos
 */
class Aviao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aviao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Lugares', 'Lugares_eco', 'Lugares_exec'], 'required'],
            [['Lugares_eco', 'Lugares_exec'], 'integer'],
            [['Nome', 'Lugares'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nome' => 'Nome',
            'Lugares' => 'Lugares',
            'Lugares_eco' => 'Lugares Eco',
            'Lugares_exec' => 'Lugares Exec',
        ];
    }

    /**
     * Gets query for [[Lugars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['Aviao_ID' => 'ID']);
    }

    /**
     * Gets query for [[Trajetos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrajetos()
    {
        return $this->hasMany(Trajeto::className(), ['Aviao_ID' => 'ID']);
    }
}
