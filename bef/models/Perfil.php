<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $foto
 * @property int $sexo
 * @property string $data
 * @property int $id_grupo
 *
 * @property User $id0
 * @property Grupo $grupo
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sobrenome', 'foto', 'sexo', 'data', 'id_grupo'], 'required'],
            [['sexo', 'id_grupo'], 'integer'],
            [['data'], 'safe'],
            [['nome', 'sobrenome'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 40],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['id_grupo' => 'id']],
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
            'sobrenome' => 'Sobrenome',
            'foto' => 'Foto',
            'sexo' => 'Sexo',
            'data' => 'Data',
            'id_grupo' => 'Id Grupo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['id' => 'id_grupo']);
    }
    public static function getIdGrupo($id){
    return static::findOne(['id'=> $id]);
}
}
