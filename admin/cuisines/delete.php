<?php
session_start();
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\CuisinesTable;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $cuisinesTable = new CuisinesTable(new MySQL());
        $cuisinesTable->delete($id);
        HTTP::redirect('/admin/cuisines/');
        exit();
    } catch (Throwable $e) {
        HTTP::redirect('/admin/cuisines/', ['error' => $e->getMessage()]);
    }
}
