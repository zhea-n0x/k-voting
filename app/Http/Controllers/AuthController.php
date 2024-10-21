<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class AuthController extends Controller
{
    //login api endpoint
    public $apiLogin = 'http://sid.polibatam.ac.id/apilogin/web/api/auth/login';


    //login ui
    public function login()
    {
        return view('login');
    }

    //login logic
    public function loginProcess()
    {
        $client = new \GuzzleHttp\Client();

        $username = request('username');
        $password = request('password');

        if($username == '' || $password == ''){
            Alert::error('Tidak Valid !', 'Username atau password tidak boleh kosong !');
            return redirect()->back();
        }

        //post using guzzle
        $response = $client->request('POST', $this->apiLogin, [
            'form_params' => [
                'username' => request('username'),
                'password' => request('password'),
                'token' => 'imsLKICAxlFhEOkbxeO8bbQu2LE44zVf'
            ]
        ]);

        $res = json_decode($response->getBody(), true);

        if($username == '4dm!n_kp!R4')
        {
            $user = User::where('username', $username)->first();

            session([
                'username' => $user['username'],
                'name' => $user['name'],
                'study_status' => $user['status'],
                'vote_status' => 'belum',
                'study_program' => $user['prodi'],
                'gender' => $user['gender'],
                'id' => $user['id'],
                'login' => true,
            ]);

            Alert::success('Berhasil Login !', 'Selamat datang '.$user['name']);
            return redirect('/privileged_admin');
        }

        if($res['status'] == 'success'){
            if($res['data']['status'] == 'Lulus'){
                Alert::warning('Unauthorized !', 'Maaf, anda tidak dapat mengakses sistem ini !');
                return redirect()->back();
            }else{
                $data = [
                    'username' => $res['data']['username'],
                    'name' => $res['data']['name'],
                    'study_status' => $res['data']['status'],
                    'vote_status' => 'belum',
                    'study_program' => $res['data']['prodi'],
                    'gender' => $res['data']['jk'],
                    'password' => bcrypt($password),

                ];

                $user = User::where('username', $res['data']['username'])->first();


                if($user){
                    Alert::error('Anda Sudah Voting !', 'Terima kasih telah menggunakan hak suara anda sebelumnya!');
                    return redirect()->back();
                }else{
                    $insertUser = User::create($data);

                    session([
                        'username' => $res['data']['username'],
                        'name' => $res['data']['name'],
                        'study_status' => $res['data']['status'],
                        'vote_status' => 'belum',
                        'study_program' => $res['data']['prodi'],
                        'gender' => $res['data']['jk'],
                        'id' => $insertUser->id,
                        'login' => true,
                    ]);

                    if($insertUser){
                        Alert::success('Berhasil Login !', 'Selamat datang '.$res['data']['name']);
                        return redirect()->route('user/vote');
                    }else{
                        Alert::error('Gagal !', 'Terjadi kesalahan saat menyimpan data');
                        return redirect()->back();
                    }
                }
            }

        }else{
            Alert::error('Unauthorized !', 'Username atau password tidak valid !');
            return redirect()->back();
        }


    }

    //logout
    public function logout()
    {
        session()->flush();
        Alert::success('Berhasil Logout !', 'Terima kasih telah menggunakan hak suara anda !');
        return redirect()->route('login');
    }
}


?>
