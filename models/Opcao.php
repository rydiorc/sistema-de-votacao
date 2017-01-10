<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "opcao".
 *
 * @property string $id
 * @property string $nome
 * @property string $imagem
 * @property string $responsavel
 * @property string $categoria_id
 *
 * @property Categoria $categoria
 * @property Voto[] $votos
 */
class Opcao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'opcao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'categoria_id'], 'required'],
            [['id', 'categoria_id'], 'integer'],
            [['nome', 'responsavel'], 'string', 'max' => 45],
            [['imagem'], 'string', 'max' => 100],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
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
            'imagem' => 'Imagem',
            'responsavel' => 'Responsavel',
            'categoria_id' => 'Categoria ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVotos()
    {
        return $this->hasMany(Voto::className(), ['opcao_id' => 'id']);
    }
}
