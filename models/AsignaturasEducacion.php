<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignaturas_educacion".
 *
 * @property int $id
 * @property string $nombre_asignatura
 * @property int $tipoeducacion_id
 *
 * @property ProfesorEncargado[] $profesorEncargados
 * @property TiposEducacion $tipoeducacion
 */
class AsignaturasEducacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignaturas_educacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_asignatura', 'tipoeducacion_id'], 'required'],
            [['tipoeducacion_id'], 'integer'],
            [['nombre_asignatura'], 'string', 'max' => 60],
            [['tipoeducacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => TiposEducacion::class, 'targetAttribute' => ['tipoeducacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_asignatura' => 'Nombre Asignatura',
            'tipoeducacion_id' => 'Tipoeducacion ID',
        ];
    }

    /**
     * Gets query for [[ProfesorEncargados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorEncargados()
    {
        return $this->hasMany(ProfesorEncargado::class, ['asignaturas_id' => 'id']);
    }

    /**
     * Gets query for [[Tipoeducacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoeducacion()
    {
        return $this->hasOne(TiposEducacion::class, ['id' => 'tipoeducacion_id']);
    }
}
