<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property int $id
 * @property int $id_produtdo
 * @property int $id_user
 * @property int $qtd
 * @property string $valor
 * @property int $id_status
 * @property string $data
 *
 * @property Produto $produtdo
 * @property User $user
 * @property StatusCompra $status
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produtdo', 'id_user', 'qtd', 'valor', 'id_status'], 'required'],
            [['id_produtdo', 'id_user', 'qtd', 'id_status'], 'integer'],
            [['valor'], 'number'],
            [['data'], 'safe'],
            [['id_produtdo'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produtdo' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => StatusCompra::className(), 'targetAttribute' => ['id_status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produtdo' => 'Id Produtdo',
            'id_user' => 'Id User',
            'qtd' => 'Qtd',
            'valor' => 'Valor',
            'id_status' => 'Id Status',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutdo()
    {
        return $this->hasOne(Produto::className(), ['id' => 'id_produtdo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusCompra::className(), ['id' => 'id_status']);
    }
}
