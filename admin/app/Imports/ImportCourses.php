<?php

namespace App\Imports;

use App\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCourses implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Course([
            'course_code'     => $row['course_code'],
            'course_name'    => $row['course_name'],
            'course_description'    => $row['course_description'],
        ]);
    }

    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        //dd($e);
    }

}
