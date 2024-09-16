<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku as ModelBuku;
use App\Models\ModelPeminjaman;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

use function PHPUnit\Framework\returnSelf;

class ControllerPeminjaman extends BaseController
{
    protected $peminjamn;
    protected $user;
    protected $buku;
    public function __construct()
    {
        $this->peminjamn = new ModelPeminjaman();
        $this->user = new ModelUser();
        $this->buku = new ModelBuku();
    }
    public function index()
    {
        $dataPinjam = $this->peminjamn
            ->join('user', 'peminjaman.UserID = user.UserID')
            ->join('buku', 'peminjaman.BukuID = buku.id_buku')
            ->findAll();
        return view('peminjaman/data_pinjam', ["dataPinjam" => $dataPinjam]);
        // print_r($dataPinjam);
    }
    public function hlm_tambah()
    {
        $User = $this->user->findAll();
        $Buku = $this->buku->where("status", "tersedia")->findAll();
        $data = [
            "User" => $User,
            "Buku" => $Buku,
        ];

        return view(
            'peminjaman/pinjam',
            $data
        );
    }

    public function pinjam()
    {
        $data = $this->request->getPost();

        $User = $this->user->where('Username', $data["Username"])->first();
        if (!$User) {
            return view('peminjaman/pinjam', ['messege' => 'Username tidak ditemukan']);
        } else {
            $data["UserID"] = $User["UserID"];
            $data["StatusPeminjaman"] = "belum kembali";
            unset($data["Username"]);
            $Buku = $this->buku->find($data["BukuID"]);
            if ($Buku == null) {
                return view('peminjaman/pinjam', ["messege" => "Buku tidak tersedia"]);
            } else {

                if ($Buku["status"] != "tersedia") {
                    return view('peminjaman/pinjam', ["messege" => "Buku ini sedang dipinjam, silahkan pilih buku lain"]);
                } else {
                    $this->peminjamn->save($data);
                    $this->buku->update($data["BukuID"], ["status" => "dipinjam"]);
                    return redirect()->to('/data_pinjam');
                }
            }
        }
    }

    public function kembali()
    {
        $data = $this->request->getPost();
        $this->peminjamn->update($data["PeminjamanID"], ["StatusPeminjaman" => "kembali"]);
        $this->buku->update($data["BukuID"], ["status" => "tersedia"]);
        return redirect()->to('/data_pinjam');
    }

    public function hlm_edit()
    {
        $default = $this->request->getPost();
        $User = $this->user->whereNotIn('UserID', [$default["UserID"]])->findAll();
        $Buku = $this->buku->where("status", "tersedia")->whereNotIn("id_buku", [$default["BukuID"]])->findAll();
        $data = [
            "User" => $User,
            "Buku" => $Buku,
            "Default" => $default
        ];
        return view('peminjaman/edit', $data);
    }

    public function edit()
    {
        $data = $this->request->getPost();
        if ($data["BukuID"] != $data["BukuIDlama"]) {
            $this->buku->update($data["BukuID"], ["status" => "dipinjam"]);
            $this->buku->update($data["BukuIDlama"], ["status" => "tersedia"]);
        }
        $this->peminjamn->update($data['PeminjamanID'], $data);
        return redirect()->to('/data_pinjam');
    }

    public function hapus(){
        $data= $this->request->getPost('PeminjamanID');
        $this->peminjamn->delete($data);
        return redirect()->to('/data_pinjam');
    }
}
