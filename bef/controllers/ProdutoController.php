<?php

namespace app\controllers;

use Yii;
use app\models\Produto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Uploadform;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Perfil;
use dosamigos\qrcode\formats\MailTo;
use dosamigos\qrcode\QrCode;
use yii\data\Pagination;
/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                   
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                     [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Produto models.
     * @return mixed
     */
    public function actionIndex($idCategoria = null, $vendido = "false", $novo = "false" )
    { 
        
//        $query = Produto::find()->orderBy(['vendido'=>SORT_DESC]);
//         $dataProvider = new ActiveDataProvider([
//            'query' =>$query ,
//        ]);
         $query = Produto::find()->orderBy(['nome'=>SORT_DESC]);
  
 
        
        
        if($idCategoria != 0){
        $query->andFilterWhere(["=", "id_categoria", $idCategoria]);
        }
                if($vendido == "true"){
       $query->andFilterWhere(["=", "vendido", 0]);
        }
                   if($novo == "true"){
                      
       $query->andFilterWhere(["=", "novo", 0]);
                             
                       
                       }
                         $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count()]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        return $this->render('index', [
            'models' => $models,
            'idCategoria' => $idCategoria,
            'vendido' => $vendido,
            'novo' => $novo,
            'pages'  => $pages
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
            
        return $this->render('view', [
            'model' => $this->findModel($id)
           
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produto();
        $modelUP = new UploadForm();
        if ($model->load(Yii::$app->request->post())) {
             $modelUP->imageFile = UploadedFile::getInstance($model, 'foto');
               $nome = md5(uniqid(""));
                
             //if($modelUP->upload($nome)){
              $model->id_user = User::findByUsername(Yii::$app->user->identity->username)->id;
              $model->id_grupo = Perfil::getIdGrupo($model->id_user)->id_grupo;
                
              //  $model->foto = $nome . '.jpg';
              
			// return $model;
                if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
             }
             
             //   }
                 return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model, 'foto')){
             $modelUP->imageFile = UploadedFile::getInstance($model, 'foto');
            
             $nome = md5(uniqid(""));
                
             if($modelUP->upload($nome)){
                  $model->foto = $nome . '.jpg';
             }
            } 
           if($model->novo == "on"){
                $model->novo = 0;
                    
                }else{
                    $model->novo = 1;
                }
                
                
                if($model->descricao == null){
                    $model->descricao = $model->nome;
                } 
                if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
             }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
 public function actionQrcode($id)
    {
       
        return QrCode::png($id);
    }
    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    protected function findModel($id)
    {
        if (($model = Produto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
