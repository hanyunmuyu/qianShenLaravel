<?php


namespace App\Repositories\Admin;


use App\Models\Community;

class CommunityRepository
{
    public function getCommunityList($communityName = null)
    {
        return Community::orderby('id', 'desc')
            ->where(function ($q) use ($communityName) {
                if ($communityName) {
                    $q->where('community_name', 'like', "%$communityName%");
                }
            })
            ->paginate();
    }
}
