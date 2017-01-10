<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property string $id
 * @property string $nome
 * @property string $evento_id
 *
 * @property Evento $evento
 * @property Opcao[] $opcaos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'evento_id'], 'required'],
            [['id', 'evento_id'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
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
            'evento_id' => 'Evento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvento()
    {
        return $this->hasOne(Evento::className(), ['id' => 'evento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpcaos()
    {
        return $this->hasMany(Opcao::className(), ['categoria_id' => 'id']);
    }
}
