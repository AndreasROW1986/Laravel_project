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

    public function editComment(Request $request, BlogDB $db)
    {                       
        try {
            if ($request->update === "true") {
                $db->updateComment($request->commentID, $request->comment);
                $answer = [
                    'comment' => $request->comment,
                    'error' => ''
                ];
            } else {
                $db->insertComment(intval($request->postID), $request->comment);    
            }
        } catch (Exception $e) {
            $answer = [
                'comment' => '',
                'error' => $e->getMessage()
            ];
        }   
        return response($answer);       
    }
}
