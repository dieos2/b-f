<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\web\UploadedFile;

class UploadForm extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload($nome)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('produtos/'.$nome . '.jpg' );
            return true;
        } else {
            return false;
        }
    }
    public function MoveParaPasta($pasta){
        $this->imageFile->saveAs('images/'.$pasta.'/'. $this->imageFile);
    }
}