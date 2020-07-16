<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\BlogDB as BlogDB;
use App\Repositories\Fixer as Fixer;

class PostController extends Controller
{
    protected $dbContainer;
    protected $fixerController;
    
    public function __construct()//BlogDB $container, Fixer $fixerController)
    {
        //$this->dbContainer = $container;
        //$this->fixerController = $fixerController;
    }
    
    public function index()
    {
        $defCrn = 'USD';
        
        //$artikeln = $this->dbContainer->getTopArtikels();
        
        $DB = new BlogDB();
        $artikeln = $DB->getTopArtikels();

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
        
        if (isset($_POST['comment'])) {
            
            if (isset($_SESSION['editComment'])) {
                $CommentID = intval($_SESSION['editComment']);
                $comment = trim($_POST['comment']);
                
                $this->dbContainer->updateComment($CommentID, $comment);
                unset($_SESSION['editComment']);
            } else {
                $comment = $_POST['comment'];
                $this->dbContainer->insertComment($PostID, $comment);
            }
        }
        
        $comment = "";
        if (isset($_POST['edit'])) {
            $CommentID = $_POST['edit'];
            $_SESSION['editComment'] = $CommentID;
            $comment = $this->dbContainer->commentByID($CommentID);
        }
        
        $post = $this->dbContainer->getPost('artikels', $PostID);
        $comments = $this->dbContainer->commentsByPost($PostID);        
        
        $this->render('post', [
            'post' => $post, 
            'comments' => $comments,
            'commentEdit' => $comment
            ]);
    }

    public function showAllPosts()
    {
        $artikeln = $this->dbContainer->getAll('artikels');

        $this->render('index', ['artikeln' => $artikeln]);
    }
}