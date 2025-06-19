<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Pasien extends ResourceController
{
    protected $modelName = 'App\Models\PasienModel';
    protected $format    = 'json';

    
    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
    }

   
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound("Pasien tidak ditemukan.");
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getJSON(true); 
        if ($this->model->insert($data)) {
            return $this->respondCreated(['message' => 'Pasien berhasil ditambahkan.']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Pasien berhasil diupdate.']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

 
    public function delete($id = null)
    {
        if (!$this->model->find($id)) return $this->failNotFound('Pasien tidak ditemukan.');
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Pasien berhasil dihapus.']);
    }
}
?>
