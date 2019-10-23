<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CommunityRepository;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    private $communityRepository;

    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    public function index()
    {
        return view('admin.community.index');
    }

    public function list(Request $request)
    {
        $communityName = $request->get('communityName');
        $communityList = $this->communityRepository->getCommunityList($communityName);
        return $this->success($communityList->toArray());
    }
}
