<?php

namespace App\Models;

class Post extends Database {

    public static function getPosts() {        
        // $this->db->query("SELECT * FROM Posts ORDER BY date DESC LIMIT 10");
        $results = self::$db->query("SELECT * FROM Posts LIMIT 10");
        return $results->fetchAll();
    }

}