<?php


namespace App\Helpers;
use Illuminate\Support\Str;

class Helper
{
    public static function experience($experiences,  $char = '')
    {
        $html = '';

        foreach ($experiences as $key => $experience) {

                $html .= '
                    <tr>
                        <td>' . $experience->id . '</td>
                        <td>'  .$experience->job_name . '</td>
                        <td>'  . $experience->start_time . '</td>
                        <td>'  . $experience->end_time . '</td>
                        <td>'  . $experience->company_name . '</td>
                        <td>'  . $experience->description . '</td>

                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/experience/edit/' . $experience->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/admin/experience/list/" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $experience->id . ', \'/admin/experience/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($experiences[$key]);


        }

        return $html;
    }

    public static function fileUpload($files,  $char = '')
    {
        $html = '';

        foreach ($files as $key => $file) {

            $html .= '
                    <tr>
                        <td>' . $file->id . '</td>
                        <td>' . $file->name . '</td>
                        <td>' . $file->file_path . '</td>

                    </tr>
                ';

            unset($files[$key]);


        }

        return $html;
    }
}
