<?php


namespace App\Http\Services\Experience;

use App\Models\Experience;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ExpService
{
    public function create($request)
    {
        try {
            Experience::create([
                'job_name' => (string)$request->input('job_name'),
                'start_time' => (string)$request->input('start_time'),
                'end_time' => (string)$request->input('end_time'),
                'company_name' => (string)$request->input('company_name'),
                'description' => (string)$request->input('description')
            ]);

            Session::flash('success', 'Thêm kinh nghiệm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll()
    {
        return Experience::orderbyDesc('id')->paginate(20);
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $experience = Experience::where('id', $id)->first();
        if ($experience) {
            return Experience::where('id', $id)->delete();
        }

        return false;
    }

    public function update($request, $experience): bool
    {

        $experience->job_name = (string)$request->input('job_name');
        $experience->start_time = (string)$request->input('start_time');
        $experience->end_time = (string)$request->input('end_time');
        $experience->company_name = (string)$request->input('company_name');
        $experience->description = (string)$request->input('description');
        $experience->save();

        Session::flash('success', 'Cập nhật thành công kinh nghiệm');
        return true;
    }
}
