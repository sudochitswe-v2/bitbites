<?php
session_start();

use Bb\Blendingbites\Helpers\Auth;
use Bb\Blendingbites\Libs\Database\CommentsTable;
use Bb\Blendingbites\Libs\Database\MySQL;

require_once '../../env_loader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    if (isset($_POST['_method']) && $_POST['_method'] == 'POST') {
        $redirect = $_POST['url'];
        $url = str_replace($_ENV["BASE_PATH"], '', $redirect);
        $data = [
            'content' => $_POST['content'],
            'post_id' => $_POST['post_id'],
            'user_id' => Auth::check()->id
        ];

        try {
            $commentsTable = new CommentsTable(new MySQL());
            $commentsTable->insert($data);
            header("Location: $url");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        exit;
    }
    if (isset($_POST['_method']) && $_POST['_method'] == 'DELETE') {
        $redirect = $_POST['url'];
        $url = str_replace($_ENV["BASE_PATH"], '', $redirect);
        $id = $_POST['id'];
        try {
            $commentsTable = new CommentsTable(new MySQL());
            $commentsTable->delete($id);
            header("Location: $url");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        exit;
    }
}
