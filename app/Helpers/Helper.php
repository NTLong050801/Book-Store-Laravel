<?php
namespace App\Helpers;
class Helper{
    public static function categories($categories){
        $html = "";
        foreach($categories as $key => $cate){
            $html .= "
            <tr>
                <th>2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
            ";
        }
    }
}