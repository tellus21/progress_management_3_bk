<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Progress;
use Illuminate\Support\Facades\DB;
use App\Services\CheckProgressData;
use App\Http\Requests\StoreProgress;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // $progresses = DB::table('progresses')
        //     ->select('id', 'reception_time', 'reception_person', 'name')
        //     ->orderBy('id', 'asc')
        //     ->paginate(20);

        //検索フォーム
        $query = DB::table('progresses');

        //もしキーワードがあったら
        if ($search !== null) {
            //全角スペースを半角に
            $search_split = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach ($search_split2 as $value) {
                $query->where('name', 'like', '%' . $value . '%');
            }
        };

        $query->select('id', 'name', 'reception_time', 'reception_person', 'created_at');
        $query->orderBy('created_at', 'asc');
        $progresses = $query->paginate(20);


        // dd($progresses);

        return view('progress.index', compact('progresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('progress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgress $request)
    {
        $progress = new Progress;

        $progress->reception_time = $request->input('reception_time');
        $progress->reception_person = $request->input('reception_person');
        $progress->name = $request->input('name');
        $progress->gender = $request->input('gender');
        $progress->company = $request->input('company');
        $progress->doctor_check = $request->input('doctor_check');
        $progress->nurse_check = $request->input('nurse_check');

        $progress->save();

        return redirect('progress/index');
        // dd($reception_person, $name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progress = Progress::find($id);

        $gender = CheckProgressData::checkGender($progress);
        $doctor_check = CheckProgressData::checkDoctorCheck($progress);
        $nurse_check = CheckProgressData::checkNurseCheck($progress);

        return view(
            'progress.show',
            compact('progress', 'gender', 'doctor_check', 'nurse_check')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progress = Progress::find($id);

        return view('progress.edit', compact('progress'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $progress = Progress::find($id);

        $progress->reception_time = $request->input('reception_time');
        $progress->reception_person = $request->input('reception_person');
        $progress->name = $request->input('name');
        $progress->gender = $request->input('gender');
        $progress->company = $request->input('company');
        $progress->doctor_check = $request->input('doctor_check');
        $progress->nurse_check = $request->input('nurse_check');

        $progress->save();

        return redirect('progress/index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progress = Progress::find($id);
        $progress->delete();

        return redirect('progress/index');
    }
}