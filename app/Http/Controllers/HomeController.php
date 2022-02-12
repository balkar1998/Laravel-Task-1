<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uservalue = array();
        $data = User::find(auth()->id());
        $uservalue['expect_salary'] = $data['expect_salary'];
        $uservalue['expect_occuption'] =  $data['expect_occuption'];
        $uservalue['expect_familytype'] =  $data['expect_familytype'];
        $uservalue['expect_manglik'] =  $data['expect_manglik'];
     
        // return $uservalue;

        $userdata = User::where('gender','!=',$data['gender'])->get();
        $senddata = array();
        foreach ($userdata as $key => $item) {
            $temparr = array();
            if ($item['id'] != auth()->id() && $item['email'] != 'adminmake@gmail.com') {
                $temparr['id'] = $item['id'];
                $temparr['expect_salary'] = $item['income'];
                $temparr['expect_occuption'] = $item['occupation'];
                $temparr['expect_familytype'] = $item['familytype'];
                $temparr['expect_manglik'] = $item['manglik'];
                array_push($senddata, $temparr);
            }
            $temparr = array();
        }
        // return $senddata;
        $final = array();
        foreach ($senddata as $value) {
            $lastdata = array_diff($uservalue, $value);
            // return($uservalue);
            $lastdata['id'] = $value['id'];
            if (isset($lastdata['expect_familytype'])) {
                $abc = explode(',', $lastdata['expect_familytype']);
                foreach ($abc as $item) {
                    if ($item == $value['expect_familytype']) {
                        unset($lastdata['expect_familytype']);
                    }
                }
            }

            if (isset($lastdata['expect_occuption'])) {
                $abc = explode(',', $lastdata['expect_occuption']);
                foreach ($abc as $item) {
                    if ($item == $value['expect_occuption']) {
                        unset($lastdata['expect_occuption']);
                    }
                }
            }

            if (isset($lastdata['expect_salary'])) {
                // return $lastdata['expect_salary'];
                $abc3 = explode(',', $lastdata['expect_salary']);
                if (($value['expect_salary'] >= $abc3[0] ) and ($value['expect_salary'] <= $abc3[1])) {
                    unset($lastdata['expect_salary']);
                }
            }
            array_push($final, $lastdata);
        }

        // return $final;
        $lst = array();
        $front = array();
        $second = array();
        $thrid = array();
        $foruth = array();
        foreach ($final  as $finalid) {
            $ctf = count($finalid);
            $lsting = User::where('id', $finalid['id'])->get();
            if ($ctf == 1) {
                $front[] = $lsting;
            }
            if ($ctf == 2) {
                $second[] = $lsting;
            }
            if ($ctf == 3) {
                $thrid[] = $lsting;
            }
            if ($ctf == 4) {
                $foruth[] = $lsting;
            }
        }
        array_push($lst, $front);
        array_push($lst, $second);
        array_push($lst, $thrid);
        array_push($lst, $foruth);

        return view('home', ['ddtt' => $lst]);
    }
}
