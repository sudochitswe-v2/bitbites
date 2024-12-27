<?php
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\DietaryPreferencesTable;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $DietaryPreferencesTable = new DietaryPreferencesTable(new MySQL());
        $DietaryPreferencesTable->delete($id);
        HTTP::redirect('/admin/ditery-preference/');
        exit();
    } catch (Throwable $e) {
        HTTP::redirect('/admin/dietary-preference/', ['error' => $e->getMessage()]);
    }
}
