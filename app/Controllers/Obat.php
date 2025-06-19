<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Obat extends ResourceController
{
    protected $modelName = 'App\Models\ObatModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound("Tidak ada Obat");
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        if ($this->model->insert($data)) {
            return $this->respondCreated(['message' => 'Berhasil menambahkan oba']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Berhasil mengupdate obat']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) return $this->failNotFound('Tidak ada Obat');
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Obat berhasil dihapus']);
    }
}
?>
