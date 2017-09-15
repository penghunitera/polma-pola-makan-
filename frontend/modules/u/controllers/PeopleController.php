<?php

namespace frontend\modules\u\controllers;

use yii\web\Controller;
use Yii;
use frontend\modules\u\models\User;
use frontend\modules\u\models\Profile;
use yii\web\UploadedFile;
/**
 * Default controller for the `u` module
 */
class PeopleController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionDaftar() {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $register = Yii::$app->db->beginTransaction();
            $model->id = $model->generateRandomString();
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->created_at = date("Y-m-d h:i:s a");
            $model->status = 0;
            if ($model->save()) {
                $register->commit();
                $findUser = User::findOne(['username' => $model->username]);
                $modelProfile = new Profile();
                $modelProfile->profile_id = $modelProfile->generateRandomString();
                $modelProfile->user_id = $findUser->id;
                $modelProfile->email = $model->email;
                $modelProfile->tanggal_lahir = $model->tanggalLahir;
                $modelProfile->jenis_kelamin = $model->jenisKelamin;
                if ($modelProfile->save()) {
                    $email = \Yii::$app->mailer->compose()->setTo($modelProfile->email)
                            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                            ->setSubject('Konfirmasi Pendaftaran')
                            ->setTextBody("
Click this link " . \yii\helpers\Html::a('confirm', Yii::$app->urlManager->createAbsoluteUrl(
                                                    ['/u/people/confirm', 'id' => $findUser->id]
                                    ))
                            )
                            ->send();
                    if ($email) {
                        \Yii::$app->getSession()->setFlash('success', 'Terimakasih Telah mendaftar, Silahkan Cek Email Agar Akun anda dapat diaktifkan (Maksimal Konfirmasi 1 hari)');
                    } else {
                        Yii::$app->getSession()->setFlash('warning', 'Failed, kontak Admin mail : onandotcom@gmail.com');
                    }
                } else {

                    \Yii::$app->getSession()->setFlash('error', 'Terjadi kesalahan pada profile silahkan kontak Admin mail : onandotcom@gmail.com');
                }
                return $this->redirect(['/dashboard/p']);
            } else {
                $register->rollBack();
                $dataerror = $model->errors;

                \Yii::$app->getSession()->setFlash('error', 'Terjadi Kesalahan ' . $dataerror["username"][0] . ' silahkan kontak Admin mail : onandotcom@gmail.com');
                return $this->redirect(['/dashboard/p']);
            }
        } else {
            return $this->render('daftar', [
                        'model' => $model,
            ]);
        }
    }

    public function actionConfirm($id) {
        $user = User::find()->where([
                    'id' => $id,
                    'status' => 0,
                ])->one();
        if (!empty($user)) {
            $timeNow = date("Y-m-d h:i:s a");
            $timeCreate = $user->created_at;
            $fi = date('Y-m-d h:i:s a', strtotime($timeCreate . ' +1 day'));
            if (strtotime($timeNow) > strtotime($fi)) {
                Yii::$app->getSession()->setFlash('error', 'Failed!');
                return $this->redirect(['/dashboard/p']);
            }
        }

        if (!empty($user)) {
            $user->status = 1;
            $user->save(false);
            Yii::$app->getSession()->setFlash('success', 'Konfirmasi Sukses!, Silahkan Login');
        } else {
            Yii::$app->getSession()->setFlash('warning', 'Failed!');
        }
        return $this->redirect(['/dashboard/p']);
    }

    public function actionUpdate($q) {
        $model = $this->findModel($q);

        if ($model->load(Yii::$app->request->post())) {
            $datafoto = UploadedFile::getInstance($model, 'foto');
            
            if ($datafoto == NULL) {
                if($model->foto == NULL ){
                    $model->foto = "NULL";
                }
            } else {
                $model->foto = $model->profile_id . '.' . $datafoto->extension;
                if ($datafoto->saveAs(Yii::getAlias('../web/imagesUser/') . $model->foto)) {
                    \Yii::$app->getSession()->setFlash('success', 'Berhasil Menyimpan Profil');
                } else {
                    $register->rollBack();
                    \Yii::$app->getSession()->setFlash('error', 'Gagal Menyimpan Profils');
                }
            }
            $model->save();
            return $this->render('bereng', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionProfil($q) {
        $model = Profile::findOne(['user_id' => $q]);

        if ($model == NULL) {
            return $this->redirect(['add-profil', 'q' => $q]);
        } else if ($model->berat_badan == 0) {
            \Yii::$app->getSession()->setFlash('error', 'Silahkan mengisi data berat dan tinggi badan');
            return $this->redirect(['update', 'q' => $q]);
        } else {
            return $this->render('bereng', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAddProfil($q) {
        $model = new Profile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->profile_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
