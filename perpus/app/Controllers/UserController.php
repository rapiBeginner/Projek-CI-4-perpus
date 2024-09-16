<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku;
use App\Models\ModelPeminjaman;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $user;
    protected $buku;
    protected $peminjaman;

    public function __construct()
    {
        $this->user = new ModelUser();
        $this->peminjaman = new ModelPeminjaman();
        $this->buku = new Buku();
    }

    public function index()
    {
        return view('user/register');
    }
    public function hlm_edit()
    {
        $data = $this->request->getPost();
        return view('user/edit_user', $data);
    }

    public function register()
    {
        $data = [
            "Username" => $this->request->getPost("Username"),
            "NamaLengkap" => $this->request->getPost("NamaLengkap"),
            "Password" => base64_encode($this->request->getPost("Password")),
            "Email" => $this->request->getPost("Email"),
            "Alamat" => $this->request->getPost('Alamat'),
            "hak_akses" => 'peminjam'
        ];
        $cek = $this->user->where('Username', $data["Username"])->first();
        if ($cek) {
            return view('user/register', [
                "messege" => "Username telah digunakan, silahkan coba username lain"
            ]);
        } else {
            $this->user->save($data);
            return view('welcome_message', [
                "messege" => "Register berhasil, silahkan login"
            ]);
        }
    }

    public function tampil()
    {
        $data = $this->user->findAll();
        return view('user/data_user', ["data" => $data]);
    }
    public function edit()
    {
        $data = [
            "Username" => $this->request->getPost("Username"),
            "Email" => $this->request->getPost("Email"),
            "Password" => base64_encode($this->request->getPost("Password")),
            "NamaLengkap" => $this->request->getPost("NamaLengkap"),
            "Alamat" => $this->request->getPost("Alamat"),
        ];

        $id = $this->request->getPost("UserID");
        $cek = $this->user->where("Username", $data["Username"])->whereNotIn("UserID", [$id])->first();
        if ($cek) {
            $data["messege"]="Username telah digunakan";
            $data["UserID"]= $id;
            // $data["Password"]= base64_decode($data["Password"]);
            return view('user/edit_user', $data);
        } else {
            $this->user->update($id, $data);
            return redirect()->to('/data_user');
        }
    }

    public function hapus()
    {
        $data = $this->request->getPost('UserID');
        $dataPinjam = $this->peminjaman->where("UserID", $data)->findAll();
        foreach ($dataPinjam as $key) {
            $this->buku->update($key["BukuID"],["status"=>"tersedia"]);
            $this->peminjaman->where("UserID", $data)->delete();
        }
        $this->user->delete($data);
        return redirect()->to('/data_user');
    }
}
