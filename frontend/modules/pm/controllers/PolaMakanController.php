<?php

namespace frontend\modules\pm\controllers;

use Yii;
use frontend\modules\pm\models\PolaMakan;
use frontend\modules\pm\models\search\PolaMakanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Mpdf\Mpdf;
/**
 * PolaMakanController implements the CRUD actions for PolaMakan model.
 */
class PolaMakanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PolaMakan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataDiri = \frontend\modules\u\models\Profile::findOne(['user_id'=> Yii::$app->user->identity->id]);
        $getInbox = \frontend\modules\msg\models\Inbox::find()->where(['SenderNumber'=>$dataDiri->no_hp,'Processed'=>"false"])->all();
       
        foreach ($getInbox as $inbox){
            $cekMakanan = \frontend\modules\pm\models\KandunganGizi::findOne(['bahan_pangan'=>$inbox->TextDecoded]);
            if($cekMakanan!= NULL){
                $mod = new PolaMakan();
                $mod->tanggal = date("d");
                $mod->bulan = date("m");
                $mod->tahun = date("Y");
                $mod->nama_makanan = $cekMakanan->id;
                $mod->time_created = date("Y-m-d H:i:s");
                $mod->id_user = Yii::$app->user->identity->id;
                $mod->save(false);
            }
            $inbox->Processed = "true";
            $inbox->save(false);
        }
        $searchModel = new PolaMakanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PolaMakan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionStatistik()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/dashboard/p']);
        }
        Yii::$app->session->setFlash('kurang', "Kalori anda kurang sebesar 100 gr <br> Protein anda kurang sebesar 30 gr<br>Posfor kurang 100 gr<br>Vitamin B kurang 25 gr");
        Yii::$app->session->setFlash('cukup', "Lemak anda tercukuoi<br>Karbohidrat tercukupi<br>Besi tercukupi");
        Yii::$app->session->setFlash('lebih', "Kalsium anda berlebih 200 gr<br>Vitamin A anda berlebih 125 gr<br>Air anda berlebih 25gr  ");
        return $this->render('statistik');
    }
  public function actionExport() {
        $model = new PolaMakan();
        $usia=0;
        $tahunLahir=0;
        $bb=0;
        $tb=0;
        $dataDiri = \frontend\modules\u\models\Profile::findOne(['user_id'=> Yii::$app->user->identity->id]);
        if($dataDiri != NULL){
            $getTahun = explode("/", $dataDiri->tanggal_lahir);
            $tahunLahir = $getTahun[2];
            $bb= $dataDiri->berat_badan;
            $tb = $dataDiri->tinggi;
        }
        
        $usia = date("Y")- $tahunLahir;
        if ($model->load(Yii::$app->request->post())) {
            $mpdf = new Mpdf();
            $id_user = \Yii::$app->user->identity->id;
            $minggu  = $model->minggu;
            $bawah = 0;
            $atas = 0;
            if($minggu == 1)
            {
                $bawah = 1;
                $atas = 7;
            }
            else if($minggu == 2)
            {
                $bawah = 8;
                $atas = 14;
            }
            if($minggu == 3)
            {
                $bawah = 15;
                $atas = 21;
            }
            if($minggu == 4)
            {
                $bawah = 22;
                $atas = 28;
            }
            $bln =  $model->bulan;
            $thn = $model->tahun;

//        $pola = \Yii::$app->db->createCommand("SELECT * FROM pola_makan WHERE(tanggal BETWEEN ".$bawah." AND ".$atas.") AND bulan=".$bln." AND tahun = ".$thn ." AND id_user='$id_user'")
//                ->query;
        $pola = PolaMakan::find()
                ->where(['between','tanggal' ,$bawah, $atas])
                ->andWhere(['id_user'=>Yii::$app->user->identity->id])
                ->andWhere(['bulan'=>$bln])
                ->andWhere(['tahun'=>$thn])
                ->all();
        $tbmeter = $tb/100;
        $bmi = $bb / $tbmeter * $tbmeter;
        	$html = '<html><head><title>Laporan Makanan</title></head><body>';
                $dataTxt ='<p align="center"><font size="14"><b>Laporan Makanan</b></font></p>';
	$nama = '<table >'
			. '<tr>'
			. '<td>Nama Lengkap</td> '
			. '<td> : </td>'
			. '<td>' . Yii::$app->user->identity->nama_lengkap . '</td>'
			. '<tr/>'
                        . '<tr>'
			. '<td>Usia</td> '
			. '<td> : </td>'
			. '<td>' . $usia . ' tahun</td>'
			. '<tr/>'
                        . '<tr>'
			. '<td>Berat Badan</td> '
			. '<td> : </td>'
			. '<td>' . $bb . ' kg</td>'
			. '<tr/>'
                        . '<tr>'
			. '<td>Tinggi Badan</td> '
			. '<td> : </td>'
			. '<td>' . $tb . ' cm</td>'
			. '<tr/>'
                        . '<tr>'
			. '<td>Body Mass Index</td> '
			. '<td> : </td>'
			. '<td>' . $bmi . ' Kategori: Obesitas Klas III</td>'
			. '<tr/>'
			. '</table>'
			. '<br>'
			. '<table  border="1"><tr> 
		<th width="50px">No</th>
		<th >Nama Makanan</th>
		<th >Kalori (kal)</th>
		<th >Protein (g)</th>
                <th >Lemak (g)</th>
                <th >Karbohidrat (g)</th>
                <th >Kalsium (mg)</th>
                <th >Posfor (mg)</th>
                <th >Besi (g)</th>
                <th >Vitamin A (Si)</th>
                <th >Vitamin B (mg)</th>
                <th >Vitamin C (mg)</th>
                <th >Air (g)</th>
                <th >Bahan (%)</th>
		</tr>';
        $mpdf->WriteHTML($dataTxt);
        $mpdf->WriteHTML($nama);
        $a=1;
        $totalbhanpangan = 0;
        $totalkalori = 0;
        $totalprotein = 0;
        $totallemak = 0;
        $totalkarbo= 0;
        $totalkalsium = 0;
        $totalposfor = 0;
        $totalbesi = 0;
        $totalvita = 0;
        $totalvitb = 0;
        $totalvitc = 0;
        $totalair = 0;
        $totalbahan = 0;
        foreach ($pola as $id_gizi)
        {
            $kandungan = \frontend\modules\pm\models\KandunganGizi::findOne(['id'=>$id_gizi->nama_makanan]);
           
            $datagizi = 
                    '<tr >'
                        . '<td width>'.$a.' </td> '
                        . '<td width>'.$kandungan->bahan_pangan.'</td> '
                    . '<td width>'.$kandungan->kalori.'</td> '
                    . '<td width>'.$kandungan->protein.'</td> '
                    . '<td width>'.$kandungan->lemak.'</td> '
                    . '<td width>'.$kandungan->karbohidrat.'</td> '
                    . '<td width>'.$kandungan->kalsium.'</td> '
                    . '<td width>'.$kandungan->posfor.'</td> '
                    . '<td width>'.$kandungan->besi.'</td> '
                    . '<td width>'.$kandungan->vitamin_a.'</td> '
                    . '<td width>'.$kandungan->vitamin_b.'</td> '
                    . '<td width>'.$kandungan->vitamin_c.'</td> '
                    . '<td width>'.$kandungan->air.'</td> '
                    . '<td width>'.$kandungan->bahan.'</td> '
                    . '</tr>';
            $mpdf->WriteHTML($datagizi);
            $totalbhanpangan;
        $totalkalori = $totalkalori + $kandungan->kalori;
        $totalprotein = $totalprotein + $kandungan->protein;
        $totallemak = $totallemak + $kandungan->lemak;
        $totalkarbo = $totalkarbo + $kandungan->karbohidrat;
        $totalkalsium = $totalkalsium + $kandungan->kalsium;
        $totalposfor = $totalposfor + $kandungan->posfor;
        $totalbesi = $totalbesi + $kandungan->besi;
        $totalvita =$totalvita + $kandungan->vitamin_a;
        $totalvitb = $totalvitb + $kandungan->vitamin_b;
        $totalvitc = $totalvitc + $kandungan->vitamin_c;
        $totalair = $totalair + $kandungan->air;
        $totalbahan = $totalbahan + $kandungan->bahan;
            $a++;
        }
        $datatotal = 
                    '<tr width="50px">'
                        . '<td  colspan=2> TOTAL </td> '
                    . '<td width>'.$totalkalori.'</td> '
                    . '<td width>'.$totalprotein.'</td> '
                    . '<td width>'.$totallemak.'</td> '
                    . '<td width>'.$totalkarbo.'</td> '
                    . '<td width>'.$totalkalsium.'</td> '
                    . '<td width>'.$totalposfor.'</td> '
                    . '<td width>'.$totalbesi.'</td> '
                    . '<td width>'.$totalvita.'</td> '
                    . '<td width>'.$totalvitb.'</td> '
                    . '<td width>'.$totalvitc.'</td> '
                    . '<td width>'.$totalair.'</td> '
                    . '<td width>'.$totalbahan.'</td> '
                    . '</tr></table>';
        $dataAKG = "<br><br><b>Data Angka Kecukupan Gizi</b><br>";
       $mpdf->WriteHTML($datatotal);
             $mpdf->WriteHTML($dataAKG);
        $findAkG = \frontend\modules\pm\models\Akg::find()->where(['jenis_manusia'=> $dataDiri->jenis_kelamin])->all();
        $bodytab = '<table  border="1"><tr> 
		<th width="50px">No</th>
		<th >Kelompok Umur</th>
                <th >Berat Badan</th>
                <th >Tinggi Badan</th>
		<th >Energi (kal)</th>
		<th >Protein (g)</th>
                <th >Lemak Total (g) </th>
                <th >Lemak(n-6) (g)</th>
                <th >Lemak(n-3) (g)</th>
                <th >Karbohidrat (g)</th>
                <th >Serat (g)</th>
                <th >Air (ml)</th>
		</tr>';
        
                $mpdf->WriteHTML($bodytab);
                $b=1;
        foreach ($findAkG as $oneakg){
            $dataak = 
                    '<tr >'
                        . '<td width>'.$b.' </td> '
                        . '<td width>'.$oneakg->kelompok_umur.'</td> '
                    . '<td width>'.$oneakg->berat_badan.'</td> '
                    . '<td width>'.$oneakg->tinggi_badan.'</td> '
                    . '<td width>'.$oneakg->energi.'</td> '
                    . '<td width>'.$oneakg->protein.'</td> '
                    . '<td width>'.$oneakg->lemak_total.'</td> '
                    . '<td width>'.$oneakg->lemakn_6.'</td> '
                    . '<td width>'.$oneakg->lemakn_3.'</td> '
                    . '<td width>'.$oneakg->karbohidrat.'</td> '
                    . '<td width>'.$oneakg->serat.'</td> '
                    . '<td width>'.$oneakg->air.'</td> '
                    . '</tr>';
            $mpdf->WriteHTML($dataak);
            $b++;
        }
        $endTab = "</table>";
        $mpdf->WriteHTML($endTab);
        $endBody= "</body></html>";
            
            $mpdf->WriteHTML($endBody);
        $mpdf->Output();
        exit;
        
//            $model->save();
//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create_1', [
                        'model' => $model,
            ]);
        }
    }
    /**
     * Creates a new PolaMakan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PolaMakan();

        if ($model->load(Yii::$app->request->post()) ) {
            $getPerpoint = \frontend\modules\pm\models\Keterangan::findOne(['nama_keterangan'=>'jumlah_point']);
              $datafoto = UploadedFile::getInstance($model, 'foto');
              $datafoto->saveAs('uploads/'.$datafoto->baseName.'.'.$datafoto->extension);
              $model->foto = $datafoto->baseName.'.'.$datafoto->extension;
              $model->id_user = Yii::$app->user->identity->id;
              $model->tanggal = date('d');
              $model->bulan = date('m');
              $model->tahun =date ('Y');
              $getProfil = \frontend\modules\u\models\Profile::findOne(['user_id'=>Yii::$app->user->identity->id]);
              $pointNow = $getProfil->poin;
              $getProfil->poin = $pointNow + $getPerpoint->ktrg;
              $getProfil->save(false);
               \Yii::$app->getSession()->setFlash('success', 'Terimakasih, Data anda telah direcord');
             $model->save(false);
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
     * Updates an existing PolaMakan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PolaMakan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PolaMakan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PolaMakan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PolaMakan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
