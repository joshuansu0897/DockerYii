<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direccion".
 *
 * @property integer $id
 * @property string $codigoPostal
 * @property string $ciudad
 * @property string $pais
 * @property string $estado
 * @property string $calle
 *
 * @property Empleado[] $empleados
 */
class Direccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigoPostal', 'ciudad', 'pais', 'estado', 'calle'], 'required'],
            [['codigoPostal'], 'string', 'max' => 5],
            [['ciudad', 'estado'], 'string', 'max' => 25],
            [['pais'], 'string', 'max' => 20],
            [['calle'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigoPostal' => 'Codigo Postal',
            'ciudad' => 'Ciudad',
            'pais' => 'Pais',
            'estado' => 'Estado',
            'calle' => 'Calle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['id_direccion' => 'id']);
    }
}
