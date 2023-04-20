<?php

namespace App\Services;

class BookService
{
/**
     * @param array $data
     * @return array
     */
    public function getBooks(array $data): array
    {
        $books = [];

        foreach ($data as $item) {
            $book['name'] = $item['name'] ?? $item['title'];
            $book['description'] = $item['description'] ?? $item['descr'];

            if (isset($item['createdAt'])) {
                $book['createdAt'] = $item['createdAt'];
            }

            if (isset($item['author'])) {
                $book['author'] = $item['author'];
            }
            $books[] = $book;
        }

        return $books;
    }
}
