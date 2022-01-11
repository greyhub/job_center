<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Recusive;
use App\Helpers\Process;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index(Request $request)
    {
        if (is_null($request->status)) {
            $status = 'Việc làm gần đây';
            $jobs = Job::latest()->paginate(9);
        }
        else {
            $status = $request->status;
            $jobs = Job::where('status', $status)->orderBy('created_at', 'asc')->paginate(9);
            $status = $status=='Hiển thị' ? 'Đang hiển thị' : 'Đang ẩn';
        }

        return view('admin.job', compact('jobs', 'status'));
    }

    public function show($id)
    {
        try {
            $job = Job::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.job')->with('error', 'Thất bại');
        }
        $job->update(['status' => 'Hiẻn thị']);

        return redirect()->route('admin.job', ['status' => 'Hiển thị'])->with('message', 'Thành công');
    }

    public function hidden($id)
    {
        try {
            $job = Job::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.job')->with('error', 'Thất bại');
        }
        $job->update(['status' => 'Ẩn']);

        return redirect()->route('admin.job', ['status' => 'Ẩn'])->with('message', 'Thành công');
    }

    public function destroy($id)
    {

        try {
            $job = Job::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.job')->with('error', 'Thất bại');
        }
        $job->delete();

        return redirect()->to(url()->previous())->with('message', 'Xóa thành công');
    }
}
