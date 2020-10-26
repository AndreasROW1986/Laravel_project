<?php

namespace App\Http\Controllers;

use App\Repositories\BlogDB as BlogDB;
//use App\Repositories\Fixer as Fixer;

class PostController extends Controller
{
    protected $dbContainer;
    //protected $fixerController;
    
    /**
     * show the post seit
     * 
     * @param closure $container
     * 
     */
    
    public function __construct(BlogDB $container) //Fixer $fixerController)
    {
        $this->dbContainer = $container;
        //$this->fixerController = $fixerController; test2
    }
    
    public function index()
    {            
        $defCrn = 'USD';
        
        $artikeln = $this->dbContainer->getTopArtikels();

        // show course on the site
        //$course = $this->fixerController->getCourse($defCrn);
        $course = [];
                    
        return view('index', [
            'artikeln' => $artikeln, 
            'course' => $course
            ]);
        
    }

    public function showPost()
    {   
        $PostID = intval($_GET['id']);
        
        $post = $this->dbContainer->getPost('artikels', $PostID);
        $comments = $this->dbContainer->commentsByPost($PostID);        
        
        return view('post', [
            'post' => $post, 
            'comments' => $comments            
            ]);
    }

    public function showAllPosts()
    {   
        $artikeln = $this->dbContainer->getAll('artikels');
        
        return view('index', ['artikeln' => $artikeln]);
    }

}