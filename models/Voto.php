<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voto".
 *
 * @property string $id
 * @property string $nome
 * @property string $identidade
 * @property string $opcao_id
 *
 * @property Opcao $opcao
 */
class Voto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'identidade', 'opcao_id'], 'required'],
            [['id', 'opcao_id'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['identidade'], 'string', 'max' => 9],
            [['identidade'], 'unique'],
            [['opcao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opcao::className(), 'targetAttribute' => ['opcao_id' => 'id']],
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
            'identidade' => 'Identidade',
            'opcao_id' => 'Opcao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpcao()
    {
        return $this->hasOne(Opcao::className(), ['id' => 'opcao_id']);
    }
}
