<?php


namespace App\Repositories\Admin;


use App\Models\School;

class SchoolRepository
{
    public function getSchoolList($schoolName = null)
    {
        return School::orderby('id', 'desc')
            ->where(function ($q) use ($schoolName) {
                if ($schoolName) {
                    $q->where('school_name', 'like', "%$schoolName%");
                }
            })
            ->paginate();
    }
}
