<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subArea".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $id_area
 *
 * @property Contenido[] $contenidos
 * @property Area $idArea
 */
class SubArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subArea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'id_area'], 'required'],
            [['descripcion'], 'string'],
            [['id_area'], 'integer'],
            [['nombre'], 'string', 'max' => 40],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id']],
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
            'descripcion' => 'Descripcion',
            'id_area' => 'Id Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContenidos()
    {
        return $this->hasMany(Contenido::className(), ['id_subArea' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'id_area']);
    }
}
