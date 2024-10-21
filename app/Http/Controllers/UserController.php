<?php

namespace App\Http\Controllers;
//use session
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Bem;
use App\Models\Dlm;
use App\Models\Vote;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //block access if not logged in
    public function __construct()
    {
        //check session
        $this->middleware(function ($request, $next) {
            if (Session::get('login') != true) {
                return redirect('/login')->with('alert', 'You must login first!');
            }
            return $next($request);
        });
    }

    //admin user
    public function index()
    {
        $total_mahasiswa = User::count()-1;
        $total_suara = Vote::count();
        $bem = Vote::join('users', 'users.id', '=', 'votes.user_id')
            ->join('bems', 'bems.id', '=', 'votes.bem_id')
            ->select('users.name as pemilih', 'bems.name as bem_voted', 'users.study_program as prodi_pemilih', 'bems.study_program as prodi_bem')
            ->get();

        $dlm = Vote::join('users', 'users.id', '=', 'votes.user_id')
            ->join('dlms', 'dlms.id', '=', 'votes.dlm_id')
            ->select('users.name as pemilih', 'dlms.name as dlm_voted', 'users.study_program as prodi_pemilih', 'dlms.study_program as prodi_dlm')
            ->get();

        $label_bem = [];
        $label_dlm = [];

        $count_bem = [];
        $count_dlm = [];

        foreach($bem as $item){
            $count_bem[$item->bem_voted] = $count_bem[$item->bem_voted] ?? 0;
            $count_bem[$item->bem_voted]++;
        }

        foreach($dlm as $item){
            $count_dlm[$item->dlm_voted] = $count_dlm[$item->dlm_voted] ?? 0;
            $count_dlm[$item->dlm_voted]++;
        }

        foreach($count_bem as $key => $value){
            array_push($label_bem, $key);
        }

        foreach($count_dlm as $key => $value){
            array_push($label_dlm, $key);
        }

        // dd($label_bem, $label_dlm, $count_bem, $count_dlm);
        return view('pages.user.home', compact('total_mahasiswa', 'total_suara', 'bem', 'count_bem', 'dlm', 'count_dlm', 'label_bem', 'label_dlm'));
    }

    //reset votes
    public function resetVote()
    {
        //reset user except username = Administrator
        User::where('username', '!=', 'Administrator')->truncate();
        return redirect('/user')->with('success', 'Votes has been reset!');
    }

    public function capresma()
    {
        $bem = Bem::all()->sortBy('no_urut');

        return view('Pages.user.data_capresma', compact('bem'));
    }

    public function capresmaDetail($id)
    {
        $bem = Bem::find($id);

        return view('Pages.user.data_capresma_detail', compact('bem'));
    }

    public function capresmaAddView()
    {
        return view('Pages.user.data_capresma_add');
    }

    public function capresmaEdit(Request $request)
    {
        //file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/bem/', $filename);
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
                'photo' => $filename,
            ];
        } else {
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
            ];
        }

        //update data
        $bem = Bem::find($request->input('id'));
        $bem->update($data);

        //alert then redirect
        Alert::success('Success', 'Pasangan No. Urut ' .$bem->no_urut . ' berhasil diupdate !');
        return redirect()->route('privileged_admin/capresma');


    }

    public function capresmaAdd(Request $request)
    {
        //file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/bem/', $filename);
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
                'photo' => $filename,
            ];
        } else {
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
            ];
        }

        //post data
        $bem = Bem::create($data);

        //alert then redirect
        Alert::success('Success', 'Pasangan No. Urut ' .$bem->no_urut . ' berhasil ditambahkan !');
        return redirect()->route('privileged_admin/capresma');


    }

    public function capresmaDelete($id)
    {
        $bem = Bem::find($id);
        $bem->delete();

        //alert then redirect
        Alert::success('Success', 'Pasangan No. Urut ' .$bem->no_urut . ' berhasil dihapus !');
        return redirect()->route('privileged_admin/capresma');
    }


    public function dlm()
    {
        $dlm = Dlm::all()->sortBy('no_urut');

        return view('Pages.user.data_dlm', compact('dlm'));
    }

    public function dlmDetail($id)
    {
        $dlm = Dlm::find($id);

        return view('Pages.user.data_dlm_detail', compact('dlm'));
    }

    public function dlmEdit(Request $request)
    {
        //file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/dlm/', $filename);
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
                'photo' => $filename,
            ];
        } else {
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
            ];
        }

        //update data
        $dlm = Dlm::find($request->input('id'));
        $dlm->update($data);

        //alert then redirect
        Alert::success('Success', 'Pasangan No. Urut ' .$dlm->no_urut . ' berhasil diupdate !');
        return redirect()->route('privileged_admin/dlm');


    }

    public function dlmAddView()
    {
        return view('Pages.user.data_dlm_add');
    }

    public function dlmAdd(Request $request)
    {
        //file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/dlm/', $filename);
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
                'photo' => $filename,
            ];
        } else {
            $data = [
                'name' => $request->input('name'),
                'no_urut' => $request->input('no_urut'),
                'study_program' => $request->input('study_program'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
            ];
        }

        //post data
        $dlm = Dlm::create($data);

        //alert then redirect
        Alert::success('Success', 'Calon No. Urut ' .$dlm->no_urut . ' berhasil ditambahkan !');
        return redirect()->route('privileged_admin/dlm');


    }

    public function dlmDelete($id)
    {
        $dlm = Dlm::find($id);
        $dlm->delete();

        //alert then redirect
        Alert::success('Success', 'Calon No. Urut ' .$dlm->no_urut . ' berhasil dihapus !');
        return redirect()->route('privileged_admin/dlm');
    }

    //public user
    public function vote()
    {
        //data
        $bem = Bem::all()->sortBy('no_urut');
        $dlm = Dlm::all()->sortBy('no_urut');
        return view('pages.user.vote', compact('bem', 'dlm'));
    }

    public function voteProcess(Request $request)
    {
        $request->validate([
            'bem' => 'required',
            'dlm' => 'required',
        ]);

        $bem = $request->input('bem');
        $dlm = $request->input('dlm');
        //get session
        $id = Session::get('id');

        $data = [
            'bem_id' => $bem,
            'dlm_id' => $dlm,
            'user_id' => $id,
        ];

        // dd($id);

        //insert data
        $vote = Vote::create($data);

        //redirect
        // Alert::success('Berhasil Memilih !', 'Terima kasih telah memilih');
        return redirect('/auth/logout');
    }
}

?>
