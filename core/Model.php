<?php
class Model {

        function __construct() {
    $db=Bootstrap::$db;

            $this->db = new Database(
                $db['DB_TYPE'],
                $db['DB_HOST'],
                $db['DB_NAME'],
                $db['DB_USER'],
                $db['DB_PASS']
            );
            }
}
?>