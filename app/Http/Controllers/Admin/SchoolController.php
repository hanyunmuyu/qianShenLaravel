<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\SchoolRepository;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        return view('admin.school.index');
    }

    public function list(Request $request)
    {
        $schoolName = $request->get('schoolName');
        $schoolList = $this->schoolRepository->getSchoolList($schoolName);
        return $this->success($schoolList->toArray());
    }
}
