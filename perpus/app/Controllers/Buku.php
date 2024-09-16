<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku as ModelsBuku;
use App\Models\ModelPeminjaman;
use CodeIgniter\HTTP\ResponseInterface;

class Buku extends BaseController
{
    protected $buku;
    protected $peminjaman;
    public function __construct()
    {
        $this->buku= new ModelsBuku();
        $this->peminjaman= new ModelPeminjaman();
    }
    public function index()
    {
        return view('buku/v_buku');
    }

    public function hlm_tambah()
    {
        return view('buku/tambah_buku');
    }

    public function hlm_edit()
    {
        return view('buku/edit_buku',$this->request->getPost());
    }

    public function tambah()    
    {
        $query= $this->request->getPost();
        $this->buku->save($query);
    }

    public function muncul(){
        $data= $this->buku->findAll();
        $hasil= [
            "hasil"=>$data
        ];
        return view('buku/v_buku',$hasil);
    }

    public function hapus($id){
        $this->buku->delete($id);
        $this->peminjaman->where("BukuID", $id)->delete();
    }

    public function perbarui(){
        $data= $this->request->getPost();
        $id= $this->request->getPost('id_buku');
        $this->buku->update($id, $data);
        // return redirect()->to(site_url('/buku'));
    }
}
