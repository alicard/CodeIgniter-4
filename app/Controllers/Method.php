<?php 
namespace App\Controllers;
// what is this?
use CodeIgniter\Controller;
use App\Models\Method_model;
use App\Models\Users_model;
use App\Controller\BaseController;

class Method extends Controller
{
	public function index()
	{
        $model = new Method_model();
        $data['bengkel'] = $model->getBengkel();
        if(session()->get('role')==='users'){
            echo "<script>
                    window.alert('Require Admin!');
                    window.location.href = 'http://localhost:8080';
                </script>";
        }

		echo view('templates/header', $data);
		echo view('dashboard',$data);
		echo view('templates/footer');
	}

    public function add_new()
    {
    	echo view('add_bengkel_view');
    }

    public function save()
    {
    	$model = new Method_model();
    	$data = array(
    		'nmBengkel' => $this->request->getPost('nmBengkel'),
    		'rtBengkel' => $this->request->getPost('rtBengkel')
    	);
    	$model->saveBengkel($data);
    	return redirect()->to('/');

    }

    public function edit($id)
    {
        $model = new Method_model();
        $data['bengkel'] = $model->getBengkel($id)->getRow();
        echo view('templates/header', $data);
        echo view('edit_bengkel',$data);
        echo view('templates/footer');
    }

    public function update()
    {
        $model = new Method_model();
        $id = $this->request->getPost('idBengkel');
        $data = array(
            'nmBengkel' => $this->request->getPost('nmBengkel'),
            'rtBengkel' => $this->request->getPost('rtBengkel'),
        );
        $model->updateBengkel($data, $id);
        return redirect()->to('/');
    }

    public function delete()
    {
        $model = new Method_model();
        $id = $this->request->getPost('idBengkel');
        $model->deleteBengkel($id);
        return redirect()->to('/');
    }

    public function add_new_rating()
    {
        echo view('add_rating_view');
    }

    public function save_rating()
    {
        $model = new Method_model();
        $data = array(
            'nmUser' => $this->request->getPost('nmUser'),
            'nmBengkel' => $this->request->getPost('nmBengkel'),
            'nilai' => $this->request->getPost('nilai')
        );
        $model->saveRating($data);
        return redirect()->to('bengkel/pcc_method');
    }

    public function similarity(){
        $model = new Method_model();
        $data['pcc'] = $model->getUserRating();
        $data['bengkel'] = $model->getBengkel();
        $data['count'] = $model->getCountRating();

        echo view('templates/header', $data);
        echo view('form_similarity',$data);
        echo view('templates/footer');
    }

    public function prediction(){
        $model = new Method_model();
        $data['pcc'] = $model->getUserRating();
        $data['bengkel'] = $model->getBengkel();
        $data['count'] = $model->getCountRating();

        echo view('templates/header', $data);
        echo view('form_prediction',$data);
        echo view('templates/footer');
    }

    public function pcc_method()
    { 
        $model = new Method_model();
        $data['pcc'] = $model->getUserRating();
        $data['bengkel'] = $model->getBengkel();
        $data['count'] = $model->getCountRating();

        echo view('templates/header', $data);
        echo view('pcc_method',$data);
        echo view('templates/footer', $data);
    }
    
    public function find_matrix()
    {   
        $model = new Method_model();
        $data['item'] = $model->getItemXY()->getResult();
        $data['column'] = $model->getnmBengkelXY()->getResult();
        $data['avgitemx'] = $model->getAvgRatingItemX()->getResult();
        $data['avgitemy'] = $model->getAvgRatingItemY()->getResult();
        $data['similarity'] = $model->getUserIntersection()->getResult();
        $data['first'] = $model->getFirstMethod();
        $data['second'] = $model->getSecondMethod();
        $data['matrix'] = $model->getMatrix();
        
        echo view('templates/header', $data);
        echo view('find_matrix',$data);
        echo view('templates/footer');
    }
    public function item()
    {
        $model = new Method_model();
        $data['item'] = $model->getItemXY()->getResult();

        // Pass multiple query form model 
        $data = $model->getAll();
        
        // Pass $data to view
        $getData = array('result' => $data);

        echo view('templates/header', $getData);
        echo view('item',$getData);
        echo view('templates/footer');
    }

    public function export_r()
    {
        $model = new Method_model();
        $data = $model->getUserRating();

        $array = array_map(function($arr) {
            return $arr; // Getting similarity values
        }, $data);
        // Disable caching
        $time = gmdate('D, d M Y H:i:s');
        header('Expires: Tue, 03 Jul 2001 06:00:00 GMT');
        header('Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate');
        header('Last-Modified: ' . $time . ' GMT');

        $filename = "rating.csv";
        // Force download
        header('Content-Type: application/force-download');
        header('Content-Type: application/octet-stream');
        header('Content-Type: application/download');
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=".$filename."");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $handle = fopen('php://output', 'w');

        foreach ($array as $key => $value) {
            fwrite($handle, implode(',', (array)$value)."\n");
        }
            fclose($handle);
    }

	//--------------------------------------------------------------------

}