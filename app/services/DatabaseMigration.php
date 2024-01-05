<?php

namespace App\Services;

use Core\Database\Database;

class DatabaseMigration
{

    public function __construct(private Database $db)
    {
    }

    public function up()
    {
        $this->createUserTable();
        $this->createCategoriesTable();
        $this->createStoriesTable();
    }

    public function down()
    {
        $this->deleteStoriesTable();
        $this->deleteCategoriesTable();
        $this->deleteUsersTable();
    }

    public function execute($sql, $table = "", $action = "Create")
    {
        try {
            $this->db->exec($sql);
            console_log("$action Table $table successful!");
        } catch (\PDOException $e) {
            console_log("$action table Error: " . $e->getMessage());
        }
    }

    private function createUserTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    bio TEXT,
                    image VARCHAR(255),
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
        $this->execute($sql, "users");
    }

    private function deleteUsersTable()
    {
        $sql = "DROP TABLE IF EXISTS users";
        $this->execute($sql, "users", "Delete");
    }

    public function createCategoriesTable()
    {
        $sql = "CREATE TABLE categories (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL,
            description TEXT,
            meta JSON
        )";
        $this->execute($sql, "categories");
    }

    public function deleteCategoriesTable()
    {
        $sql = "DROP TABLE IF EXISTS categories";
        $this->execute($sql, "categories", "Delete");
    }

    private function createStoriesTable()
    {
        $sql = "CREATE TABLE stories (
                id INT PRIMARY KEY AUTO_INCREMENT,
                user_id INT,
                category_id INT,
                title VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                image VARCHAR(255),
                likes INT DEFAULT 0,
                meta JSON,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (category_id) REFERENCES categories(id)
            )";
        $this->execute($sql, "stories");
    }

    public function deleteStoriesTable()
    {
        $sql = "DROP TABLE IF EXISTS stories";
        $this->execute($sql, "stories", "Delete");
    }
}
