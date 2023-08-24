<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargos".
 *
 * @property int $idcargos
 * @property string $cargo
 * @property string $detallecargo
 *
 * @property Personalinstitucion[] $personalinstitucions
 */
class Cargos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cargo', 'detallecargo'], 'required'],
            [['cargo', 'detallecargo'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcargos' => 'CEDULA',
            'cargo' => 'CARGO',
            'detallecargo' => 'DETALLE ',
        ];
    }

    /**
     * Gets query for [[Personalinstitucions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalinstitucions()
    {
        return $this->hasMany(Personalinstitucion::class, ['idcargo' => 'idcargos']);
    }
}
