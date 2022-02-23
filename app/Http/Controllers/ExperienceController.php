<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\Experience\CreateFormRequest;
use App\Http\Services\Experience\ExpService;


class ExperienceController extends Controller
{

    protected $experienceService;

    public function __construct(ExpService $experienceService)
    {
        $this->experienceService = $experienceService;
    }

    public function create()
    {
        return view('dashboards.admins.experience.add', [
            'title' => 'Thêm kỹ năng',
//            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->validate($request, ['job_name' => 'unique:experiences']);
        $this->experienceService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('dashboards.admins.experience.list',[
            'title'=>'Danh sách kinh nghiệm',
            'experiences'=>$this->experienceService->getAll()
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->experienceService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công kinh nghiệm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function show(Experience $experience)
    {
        return view('dashboards.admins.experience.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $experience->job_name,
            'experience' => $experience,
        ]);
    }

    public function update(Experience $experience, CreateFormRequest $request)
    {
        $this->experienceService->update($request, $experience);

        return redirect('/admin/experience/list');
    }
}
