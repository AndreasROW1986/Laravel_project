<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\BlogDB as BlogDB;

class AjaxController extends Controller
{
    public function search(Request $request, BlogDB $db)
    {                       
        if (isset($request->autor)) {
            $list = $db->searchAutor($request->autor);            
            foreach ($list as $key => $item) {
                $jsonRe["$key"] = $item->autor;
            }            
            return response($jsonRe);
        }        
    }
}
