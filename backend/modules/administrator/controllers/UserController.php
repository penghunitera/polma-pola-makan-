<?php

namespace backend\modules\administrator\controllers;

use Yii;

use backend\modules\administrator\models\User;
use backend\modules\administrator\models\AuthAssignment;
use backend\modules\administrator\models\AuthItem;
use backend\modules\administrator\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\HttpException;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $authAssignments = AuthAssignment::find()->where([
                    'user_id' => $model->id,
                ])->column();

        $authItems = ArrayHelper::map(
                        AuthItem::find()->where([
                            'type' => 1,
                        ])->asArray()->all(), 'name', 'name');

        $authAssignment = new AuthAssignment([
            'user_id' => $model->id,
        ]);
        $roleUser = AuthAssignment::findOne(['user_id' => $model->id]);
        if (Yii::$app->request->post()) {
            $authAssignment->load(Yii::$app->request->post());
            // delete all role
            AuthAssignment::deleteAll(['user_id' => $model->id]);
            $item = $authAssignment->item_name;

            $authAssignment2 = new AuthAssignment([
                'user_id' => $model->id,
            ]);
            $authAssignment2->item_name = $item;
            $authAssignment2->user_id = $id;
            $authAssignment2->created_at = time();
            $authAssignment2->save();
            Yii::$app->session->setFlash('success', 'Data tersimpan');
            $roleUser = AuthAssignment::findOne(['user_id' => $model->id]);
        }

        $authAssignment->item_name = $authAssignments;
        return $this->render('view', [
                    'model' => $model,
                    'authAssignment' => $authAssignment,
                    'authItems' => $authItems,
                    'roleUser' => $roleUser,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (!Yii::$app->user->can('admin')) {
            throw new HttpException(403, 'You are not authorized to perform this action.');
        }
        $model = new User();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->id = $model->generateRandomString();
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            
            $model->status = 1;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'User berhasil dibuat dengan password 123456');
            } else {
                Yii::$app->session->setFlash('error', 'User gagal dibuat');
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if (!Yii::$app->user->can('admin')) {
            throw new HttpException(403, 'You are not authorized to perform this action.');
        }
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()))  {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->status = $model->status == 10 ? 1 : 0;
            return $this->render('update', [
                        'model' => $model,
                        
            ]);
        }
    }
    public function actionResetpassword($id) {
        if (!\Yii::$app->user->can('admin')) {
            throw new HttpException (403, 'You are not authorized to perform this action.');
        }
        $model = new \backend\modules\administrator\models\ResetPassword();
        $datauser = User::findOne($id);
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $hash = Yii::$app->getSecurity()->generatePasswordHash($model->newpass);
                $datauser->password = $hash;
                $datauser->save();
                \Yii::$app->getSession()->setFlash('success', 'Password Berhasil Diganti');
                return $this->goHome();
            } else {
                return $this->render('resetpassword', [
                            'model' => $model,
                            'datauser'=>$datauser,
                ]);
            }
        } else {
            return $this->render('resetpassword', [
                        'model' => $model,
                        'datauser'=>$datauser,
            ]);
        }
    }
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $authAssignments = AuthAssignment::find()->where([
                    'user_id' => $model->id,
                ])->all();
        foreach ($authAssignments as $authAssignment) {
            $authAssignment->delete();
        }

        Yii::$app->session->setFlash('success', 'Delete success');
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
