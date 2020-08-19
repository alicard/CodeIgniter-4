<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;
 
class Method_model extends Model
{
    protected $table = 'bengkel';
    public $first, $second;
     
    public function getBengkel($id = false)
    {
        if($id === false){
            return $this->findAll();
        }
        else{
            return $this->getWhere(['idBengkel' => $id]);
        }   
    }

    public function saveBengkel($data)
    {
    	$query = $this->db->table($this->table)->insert($data);
    	return $query;
    }

    public function updateBengkel($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idBengkel' => $id));
        return $query;
    }

    public function deleteBengkel($id)
    {
        $query = $this->db->table($this->table)->delete(array('idBengkel' => $id));
        return $query;
    } 
 
    public function saveRating($data)
    {
        $query = $this->db->table2($this->table)->insert($data);
        return $query;
    }

    public function getUserRating()
    {
        $builder = $this->db->table('rating');
        $builder->select('rating.idUser, user.nmUser, rating.idBengkel, rating.nilai');
        $builder->join('user','user.idUser = rating.idUser', 'inner');

        $query = $builder->get();   
        $result = $query->getResult();

        return $result; 
    }

    public function getCountRating()
    {
        $builder = $this->db->table('rating')
                            ->select('count(idUser) as c_idUser');
        
        // Ci4 showing value in view with getResult()
        $query = $builder->get();
        $result = $query->getResult();
        
        // Checking result value
        if(isset($result)){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getItemXY()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];
        $builder = $this->db->table('rating')
                            ->select('user.idUser, user.nmUser, 
                                    sum( if( idBengkel = '.$itemX.', nilai, 0 ) ) AS itemX,  
                                    sum( if( idBengkel = '.$itemY.', nilai, 0 ) ) AS itemY')
                            ->join('user','user.idUser = rating.idUser', 'inner')
                            ->where('rating.idBengkel', $itemX)
                            ->orWhere('rating.idBengkel', $itemY)
                            ->groupBy('rating.idUser');

        return $builder->get();
    }

    public function getnmBengkelXY()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];
        $builder = $this->db->table('bengkel')
                            ->select('nmBengkel')
                            ->where('idBengkel', $itemX)
                            ->orWhere('idBengkel', $itemY);
        return $builder->get(); 
    }

    public function getAvgRatingItemX()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];
        $builder = $this->db->table('rating')
                            ->select('AVG(nilai) as "itemX"')
                            ->where('idBengkel', $itemX);
        //$sql = $builder->getCompiledSelect();
        //echo $sql;
        return $builder->get();  
    }

    public function getAvgRatingItemY()
    {   
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];
        $builder = $this->db->table('rating')
                            ->select('AVG(nilai) as "itemY"')
                            ->where('idBengkel', $itemY);
        //$sql = $builder->getCompiledSelect();
        //echo $sql;

        return $builder->get();
    }

    public function getUserIntersection()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];

        $builder = $this->db->table('rating')
                            ->select('rating.idUser,
                                    user.nmUser,
                                    MAX(CASE WHEN rating.idBengkel = '.$itemX.' THEN rating.nilai END) itemX,
                                    MAX(CASE WHEN rating.idBengkel = '.$itemY.' THEN rating.nilai END) itemY')
                            ->join('user','rating.idUser = user.idUser')
                            ->whereIn('rating.idBengkel', $itemX)
                            ->whereIn('rating.idBengkel', $itemY)
                            ->groupBy('rating.idUser')
                            ->having('itemX IS NOT NULL')
                            ->having('itemY IS NOT NULL');

        return $builder->get(); 
    }

    /*----------------------------------------------------------------------------------------------
        Start First Method
    ----------------------------------------------------------------------------------------------*/
    public function getFirstMethod()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];

        $builder = $this->db->table('rating as a, rating as b')
                    ->select('SUM(CASE WHEN a.idBengkel = '.$itemX.' and b.idBengkel = '.$itemY.' THEN (a.nilai-4.20)*(b.nilai-4.22) END) First')
                    ->where('a.idUser=b.idUser ')
                    ->whereIn('a.idBengkel', $itemX)
                    ->whereIn('a.idBengkel', $itemY)
                    ->having('First IS NOT NULL');

        $query = $builder->get();
        $result = $query->getResult(); 

        $row = $query->getRow();
        $this->first = $row->First;

        // Checking result value
        if(isset($result)){
            return $result;
        }
        else{
            return false;
        }      
    }
    /*----------------------------------------------------------------------------------------------
        End First Method
    ----------------------------------------------------------------------------------------------*/

    /*----------------------------------------------------------------------------------------------
        Start Second Method
    ----------------------------------------------------------------------------------------------*/
    public function getSecondMethod()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];

        $builder = $this->db->table('rating as a, rating as b')
                    ->select('SUM(CASE WHEN a.idBengkel = '.$itemX.' and b.idBengkel = '.$itemY.' THEN pow((a.nilai-4.20),2) END) pow_1,
                        SUM(CASE WHEN a.idBengkel = '.$itemX.' and b.idBengkel = '.$itemY.' THEN pow((b.nilai-4.22),2) END) pow_2')
                    ->where('a.idUser=b.idUser ')
                    ->whereIn('a.idBengkel', $itemX)
                    ->whereIn('a.idBengkel', $itemY)
                    ->having('pow_1 IS NOT NULL')
                    ->having('pow_2 IS NOT NULL');

        $query = $builder->get();
        $result = $query->getResult(); 

        // Store Total_1 and Total_2 in variable
        $row = $query->getRow();
        $sqrtX = sqrt($row->pow_1);
        $sqrtY = sqrt($row->pow_2);
        $this->second = $sqrtX*$sqrtY;
        
        // Checking result value
        if(isset($result)){
            return $result;
        }
        else{
            return false;
        }      
    }

    /*---------------------------------------------------------------------------------------------- 
        End Second Method
    ----------------------------------------------------------------------------------------------*/

    public function getMatrix()
    {
        $itemX = $_POST['itemX'];
        $itemY = $_POST['itemY'];

        $matrix = @($this->first/$this->second);

        $builder = $this->db->table('rating as a, rating as b')
                    ->select('MAX(CASE WHEN a.idBengkel = '.$itemX.' and b.idBengkel = '.$itemY.' THEN '.$matrix.' END) Matrix')
                    ->where('a.idUser=b.idUser ')
                    ->whereIn('a.idBengkel', $itemX)
                    ->whereIn('a.idBengkel', $itemY)
                    ->having('Matrix IS NOT NULL');

        $query = $builder->get();
        $result = $query->getResult(); 

        // Checking result value
        if(isset($result)){
            return $result;
        }
        else{
            echo "Please Reload";   
            return false;
        }     
    }

    public function getAll()
    {
        for($i=1; $i<=10; $i++){
            for($j=$i+1; $j<=10; $j++){

                // Get Average
                $getAverage = $this->db->table('rating')
                            ->select('user.idUser, user.nmUser, 
                                    sum( if( idBengkel = '.$i.', nilai, 0 ) ) AS itemX,  
                                    sum( if( idBengkel = '.$j.', nilai, 0 ) ) AS itemY')
                            ->join('user','user.idUser = rating.idUser', 'inner')
                            ->where('rating.idBengkel', $i)
                            ->orWhere('rating.idBengkel', $j)
                            ->groupBy('rating.idUser');

                $queryAverage = $getAverage->get();
                $resultAverage = $queryAverage->getResult();
                $allAverage[] = $resultAverage;
                $rowAverage = $queryAverage->getRow();
                $itemX[] = $rowAverage->itemX;
                
                foreach ($allAverage as $row) {
                    foreach ($row as $key => $val) {
                       
                        $t_itemX += $val->itemX;
                        $t_itemY += $val->itemY;

                        if($val->itemX > 0){
                            $c_itemX += count(array($val->itemX));
                        }
                        if($val->itemY > 0){
                            $c_itemY += count(array($val->itemY));
                        }
                    }

                    // This average will called in firtStep and secondStep
                    $a_itemX = @($t_itemX/$c_itemX);
                    $a_itemY = @($t_itemY/$c_itemY);
                }

                // First step of method
                $getFirst = $this->db->table('rating as a, rating as b')
                            ->select('SUM(CASE WHEN a.idBengkel = '.$i.' and b.idBengkel = '.$j.' THEN (a.nilai-'.$a_itemX.')*(b.nilai-'.$a_itemY.') END) First')
                            ->where('a.idUser=b.idUser ')
                            ->whereIn('a.idBengkel', $i)
                            ->whereIn('a.idBengkel', $j)
                            ->having('First IS NOT NULL');

                $queryFirst = $getFirst->get();
                $resultFirst = $queryFirst->getResult(); 
                $rowFirst = $queryFirst->getRow();
                $first[] = $rowFirst->First;

                // Second step of method
                $getSecond = $this->db->table('rating as a, rating as b')
                            ->select('SUM(CASE WHEN a.idBengkel = '.$i.' and b.idBengkel = '.$j.' THEN pow((a.nilai-'.$a_itemX.'),2) END) pow_1,
                                SUM(CASE WHEN a.idBengkel = '.$i.' and b.idBengkel = '.$j.' THEN pow((b.nilai-'.$a_itemY.'),2) END) pow_2')
                            ->where('a.idUser=b.idUser ')
                            ->whereIn('a.idBengkel', $i)
                            ->whereIn('a.idBengkel', $j)
                            ->having('pow_1 IS NOT NULL')
                            ->having('pow_2 IS NOT NULL');
       
                $querySecond = $getSecond->get();        
                $resultSecond = $querySecond->getResult();       
                $rowSecond = $querySecond->getRow();
                $sqrtX = sqrt($rowSecond->pow_1);
                $sqrtY = sqrt($rowSecond->pow_2);
                $second[]  = $sqrtX*$sqrtY;
                
            }
        }   


        /*===========================================
            This is checking empty User Similarity 
            And replace result NAN to 0
            NAN is caused by DIVISION by ZERO 
        ============================================*/

        foreach ($first as $key => $value) {
            if (is_null($value)) {
                 $first[$key] = floatval(0);;  
            }
        }
        
        foreach ($second as $key => $value) {
            if ($value==0) {
                 $second[$key] = floatval(1);  
            }
        }

        /*===========================================
            End checking 
        =============================================*/

        $similarity = array_map(function($x, $y) {
            return @($x / $y); // Getting similarity values
        }, $first, $second);

        // Insert similarity into DB
        $insertData = $this->db->table('bengkel_similarity');

        $count = 0;
        for($i=1; $i<=10; $i++){

            $same = 1.00;

            $sameData[] = [ 
                'idBengkel_1'       => json_encode($i),
                'idBengkel_2'       => json_encode($i),
                'nilaiSimilarity'   => json_encode($same, 2)
            ];

            for($j=$i+1; $j<=10; $j++){
                $data[] = [ 
                    'idBengkel_1'       => json_encode($i),
                    'idBengkel_2'       => json_encode($j),
                    'nilaiSimilarity'   => json_encode(round($similarity[$count], 4))
                ];
                $count++;
            }
        }
       //var_dump($data);

        // Get similarity from DB
        $getData = $this->db->table('bengkel_similarity')
                            ->select('*')->get();

        $resultData = $getData->getResult();

        if(empty($resultData)){
            $insertData->insertBatch($sameData);
            $insertData->insertBatch($data);
        }
        else{
            $insertData->truncate();  
            $insertData->insertBatch($sameData);
            $insertData->insertBatch($data);    
        }

        /*------------------------------------------
            Get prediction for user start here 
        -------------------------------------------*/

        // Get input form
        $idBengkel = $_POST['idBengkel'];
        $neighbor = $_POST['neighbor'];
        $userID = session()->get('idUser');

        $prediction = $this->db->table('bengkel_similarity')
                            ->select('rating.idUser, rating.idBengkel, bengkel.nmBengkel, rating.nilai, bengkel_similarity.idBengkel_1, bengkel_similarity.idBengkel_2, bengkel_similarity.nilaiSimilarity')
                            ->join('rating', 'rating.idUser = '.$userID.' AND rating.idBengkel = bengkel_similarity.idBengkel_2')
                            ->join('bengkel', 'bengkel.idBengkel = rating.idBengkel')
                            ->where('bengkel_similarity.idBengkel_1', $idBengkel)
                            ->whereIn('bengkel_similarity.idBengkel_2', function(BaseBuilder $builder) {
                                            $userID = session()->get('idUser');
                                            return $builder->select('idBengkel')->from('bengkel')->where('idUser', $userID);
                                        })
                            ->having('bengkel_similarity.nilaiSimilarity > 0');

        $queryPrediction = $prediction->get();
        $resultPrediction = $queryPrediction->getResult();

        // Mengabaikan nilai similaritas pada item yang sama
        foreach ($resultPrediction as $key => $value) {
            if($value->idBengkel){
                if($value->idBengkel_1===$idBengkel&&$value->idBengkel_2===$idBengkel){
                    unset($resultPrediction[$key]);
                }
            }
            $getNeighbor = array_slice($resultPrediction, 0, $neighbor);
        }

        // Mengecek apakah user telat merating bengkel dan neighbor terpenuhi
        if(empty($getNeighbor)){
            echo "<script>
                    window.alert('Tidak ditemukan neighbor!');
                    window.location.href = 'http://localhost:8080/method/prediction';
                </script>";
            die();
        }        
        if(count($getNeighbor)<$neighbor){
            echo "<script>
                    window.alert('Jumlah neighbor yang dipilih melampaui batas!".'\n'."User hanya memiliki ".count($getNeighbor)." neighbor');
                    window.location.href = 'http://localhost:8080/method/prediction';
                </script>";
            die();
        }

        // Set message on succes 
        $message = nl2br("Neighbor ditemukan, silakan cek tabel!<br>Uji prediksi telah diproses sistem\nJumlah neighbor yang dipilih : ".$neighbor);

        $top = 0;
        $bot = 0;
        // Method prediction definition
        foreach ($resultPrediction as $key => $value) {
            $multi[] = $value->nilai*$value->nilaiSimilarity; // Perkalian antara rating asli dengan nilai similarity
            $bot += $value->nilaiSimilarity; // Penjumlahan nilai semilarity
        }

        // Hasil perkalian dijumlahkan
        foreach ($multi as $value) {
            $top += $value;
        }

        // Store result here
        $getPrediction = @($top/$bot);
        //echo $prediction;

        // Checking result value
        if(isset($message)&&isset($resultData)&&isset($getNeighbor)&&isset($getPrediction)){
            return array('message' => $message, 'similarity' => $resultData, 'neighbor' => $getNeighbor, 'prediction' => $getPrediction );
        }
        else{
            return false;
        }      
    }

}