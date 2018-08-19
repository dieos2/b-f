<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $id
 * @property string $nome
 * @property string $logo
 *
 * @property Caixa[] $caixas
 * @property Perfil[] $perfils
 * @property Produto[] $produtos
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'logo'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['logo'], 'string', 'max' => 50],
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
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaixas()
    {
        return $this->hasMany(Caixa::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['id_grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_grupo' => 'id']);
    }
    
}
