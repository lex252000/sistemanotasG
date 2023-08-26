<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ies".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string|null $RUC
 * @property string $telefono
 * @property string $correo
 *
 * @property Periodolectivo[] $periodolectivos
 * @property Personalinstitucion[] $personalinstitucions
 * @property RectorEncargado[] $rectorEncargados
 */
class Ies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'telefono', 'correo'], 'required'],
            [['nombre', 'direccion'], 'string', 'max' => 255],
            [['RUC'], 'string', 'max' => 15],
            [['telefono'], 'string', 'max' => 10],
            [['correo'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'RUC' => 'Ruc',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }

    /**
     * Gets query for [[Periodolectivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodolectivos()
    {
        return $this->hasMany(Periodolectivo::class, ['ies_id' => 'id']);
    }

    /**
     * Gets query for [[Personalinstitucions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalinstitucions()
    {
        return $this->hasMany(Personalinstitucion::class, ['id' => 'personalinstitucion_id'])->viaTable('rector_encargado', ['ies_id' => 'id']);
    }

    /**
     * Gets query for [[RectorEncargados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRectorEncargados()
    {
        return $this->hasMany(RectorEncargado::class, ['ies_id' => 'id']);
    }
}
