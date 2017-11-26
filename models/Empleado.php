<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_direccion
 * @property string $lugarTrabajo
 * @property integer $id_user
 *
 * @property Direccion $idDireccion
 * @property User $idUser
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_direccion', 'lugarTrabajo', 'id_user'], 'required'],
            [['id_direccion', 'id_user'], 'integer'],
            [['nombre'], 'string', 'max' => 80],
            [['lugarTrabajo'], 'string', 'max' => 255],
            [['id_direccion'], 'exist', 'skipOnError' => true, 'targetClass' => Direccion::className(), 'targetAttribute' => ['id_direccion' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'id_direccion' => 'Id Direccion',
            'lugarTrabajo' => 'Lugar Trabajo',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDireccion()
    {
        return $this->hasOne(Direccion::className(), ['id' => 'id_direccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
