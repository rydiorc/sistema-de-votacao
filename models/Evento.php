<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property string $id
 * @property string $nome
 * @property string $capa
 * @property integer $ativo
 *
 * @property Categoria[] $categorias
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome'], 'required'],
            [['id', 'ativo'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['capa'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'capa' => 'Capa',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::className(), ['evento_id' => 'id']);
    }
}
