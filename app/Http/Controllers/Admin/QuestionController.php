<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessLevel;
use App\Models\Answer;
use App\Models\Department;
use App\Models\Option;
use App\Models\question;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('admin.question');
        
    }

    public function getQuestions(Request $request)
    {
        if ($request->ajax()) {
            $data = Question::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('department', function($data){
                    $actionBtn =$data->department->department_name;
                    return $actionBtn;
                })
                ->addColumn('subdepartment', function($data){
                    $actionBtn =$data->subdepartment->sub_department_name;
                    return $actionBtn;
                })
                ->addColumn('accesslevel', function($data){
                    $actionBtn =$data->accesslevel->level_name;
                    return $actionBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createQuestionShow()
    {
        $departmentData=Department::get();
        $subdepartmentdata=SubDepartment::get();
        $accesslevelData=AccessLevel::get();
        $test=1;

        return view('admin.create-question',['departments' => $departmentData,'subdepartments' => $subdepartmentdata,'access_levels' => $accesslevelData,'test' => $test]);
    }


    public function storeQuestion(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'sub_department' => 'required',
            'access_level' => 'required',
            'question' => 'required',
            'choice' => 'required',
            'optionid.*' => 'required',
            'currect_answer' => 'required'
        ]);
        
       $options[]=$request->optionid;


       $questionid=Question::create([
        'question_description' => $request->question,
        'question_image_path' => $request->question_image,
        'answer_description' =>$request->answer,
        'answer_image_path' => $request->answer_image,
        'no_of_choices' => $request->choice,
        'video_attachement_link' =>$request->video_link,
        'department_id' =>  $request->department,
        'sub_department_id' =>  $request->sub_department,
        'access_level_id' => $request->access_level,
       ]);


       $optionno=0;  
       for($i=1;$i<=sizeof($options[0]);$i++)
       {
        $optionIds=Option::create([
            'option' => $options[0][$i],
            'question_id' => $questionid->id,
        ]);

        if($i==$request->currect_answer)
        {
            $optionno=$optionIds->id;
        }
              
        }

        Answer::create([
            'question_id' => $questionid->id,
            'currect_option_id' => $optionno,
        ]);
        return redirect()->route('manager.question');



    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
}
