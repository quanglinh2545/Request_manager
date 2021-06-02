<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RequestController extends Controller
{
    //
    public function index()
    {
        $rqs = RequestModel::all();
        return view('requests.index', compact('rqs'));
    }
    public function create()
    {
        $user_id = Auth::user()->id;
        $department_id = User::where('id',$user_id)->first()->department_id;
        $ms = User::where('department_id',$department_id)->get();
        //$managers[] = new User();
        foreach($ms as $m){
            if($m->inRole('manager')) $managers[] = $m;
        }
        return view('requests.create',compact('managers'));
    }
    public function store(Request $request)
    {
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['user_id'] = Auth::user()->id;
        $data['status'] = "In progress";
        $data['priority'] = 0;
        $data['category_id'] = $request->category_id;
        $data['manager'] = $request->manager;
        $data['start_date'] = $request->start_date;
        $data['due_date'] = $request->due_date;
        $rq = RequestModel::create($data);
        return redirect('/requests/drafts');
    }
    public function edit(RequestModel $rq)
    {
        $user_id = Auth::user()->id;
        $department_id = User::where('id',$user_id)->first()->department_id;
        $ms = User::where('department_id',$department_id)->get();
        //$managers[] = new User();
        foreach($ms as $m){
            if($m->inRole('manager')) $managers[] = $m;
        }
        return view('requests.edit', compact('rq','managers'));
    }
    public function update(RequestModel $rq, Request $request)
    {
        $data = RequestModel::findOrFail($rq->id);
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['category_id'] = $request->category_id;
        $data['manager'] = $request->manager;
        $data['start_date'] = $request->start_date;
        $data['due_date'] = $request->due_date;
        $data->save();
        return redirect('/requests/drafts');
    }
    public function show($id)
    {
        $rq = RequestModel::findOrFail($id);
        $user = User::where('id',$rq->user_id)->first();
        return view('requests.show', compact('rq','user'));
    }
    public function comment()
    {
        //
    }
    public function drafts()
    {
        //$user = new User();
        $rqsQuery = RequestModel::all();
        
        $rqs = $rqsQuery;
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        if($user->inRole('admin')){
            $rqs = $rqsQuery->where('status','<>','Close');
        }
        if($user->inRole('user')){
            $rqs = $rqsQuery->where('user_id', Auth::user()->id);
        }
        if($user->inRole('manager')){
            $rqs = $rqsQuery->where('manager',$user->name);
        }
        return view('requests.drafts', compact('rqs'));
    }
    public function accept()
    {
        //
    }
    public function destroy(RequestModel $rq)
    {
      RequestModel::destroy($rq ->id);

      return redirect('/requests/drafts');
    }
    public function manage($id){

        $rq = RequestModel::find($id);
        $rq->status = $id;
        $rq->save();

        return redirect('/requests');
    }
    public function approve($id){

        $rq = RequestModel::find($id);
        $rq->status = "Open";
        $rq->save();

        return redirect('/requests/drafts');
    }
    public function reject($id){

        $rq = RequestModel::find($id);
        $rq->status = "Close";
        $rq->save();

        return redirect('/requests/drafts');
    }
}
