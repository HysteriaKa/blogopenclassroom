<!-- on regroupe tous nos controleurs dans des fonctions -->
<?php
require_once('model/postManager.php');
require_once('model/commentManager.php');

function listPosts()
{
    $postManager = new PostManager;
    $req = $postManager->getPosts();

    require('view/frontoffice/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontoffice/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines =  $commentManager->postComment($postId, $author, $comment);

        if($affectedLines === false){
            throw new Exception("Impossible d'ajouter le commentaire !");
        }
else {
    header('location: index.php?action=post&id=' . $postId);
    }
}