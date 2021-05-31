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
        $managers[] = new User();
        foreach($ms as $m){
            if($m->inRole('manager')) $managers[] = $m;
        }
       // $managers = User::where('id',$id)->get();
        return view('requests.create',compact('managers'));
    }
    public function store(Request $request)
    {
        //$data = $request->only('title', 'description');
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        // $str_slug = \Illuminate\Support\Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;
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
        $managers[] = new User();
        foreach($ms as $m){
            if($m->inRole('manager')) $managers[] = $m;
        }
        return view('requests.edit', compact('rq','managers'));
    }
    public function update(RequestModel $rq, Request $request)
    {
        $data = $request->only('title', 'description');
        //$str_slug = \Illuminate\Support\Str::slug($data['title']);
        //$data['slug'] = $str_slug;
        //$post = Post::published()->findOrFail($id);
        $rq->fill($data)->save();
        return redirect('/requests/drafts');
    }
    public function show($id)
    {
        $rq = RequestModel::findOrFail($id);
        return view('requests.show', compact('rq'));
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
        if($user->inRole('user')){
            $rqs = $rqsQuery->where('user_id', Auth::user()->id);
        }
        if($user->inRole('manager')){
            $rqs = $rqsQuery->where('manager',$user->name);
        }
        // $rqsQuery = RequestModel::all();
        // if (Gate::allows('request.draft')) {
        //     $rqsQuery = $rqsQuery->where('user_id', Auth::user()->id);
        // }
        // $rqs = $rqsQuery;

        //$rqsQuery = RequestModel::all()->where('user_id', Auth::user()->id);
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
}
