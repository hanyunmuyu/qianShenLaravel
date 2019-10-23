<?php


namespace App\Repositories\Admin;


use App\Models\Community;

class CommunityRepository
{
    public function getCommunityList($id = null, $communityName = null)
    {
        return Community::orderby('id', 'desc')
            ->where(function ($q) use ($communityName) {
                if ($communityName) {
                    $q->where('community_name', 'like', "%$communityName%");
                }
            })
            ->where(function ($q) use ($id) {
                if ($id) {
                    $q->where('id', $id);
                }
            })
            ->paginate();
    }
}
