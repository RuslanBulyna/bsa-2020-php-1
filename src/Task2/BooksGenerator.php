<?php

declare(strict_types=1);

namespace App\Task2;

class BooksGenerator
{
    public $minPagesNumber;
    public $maxPrice;
    public $libraryBooks=[];
    public $storeBooks=[];
    public $filteredBooks =[];  


    public function __construct($minPagesNumber, $libraryBooks, $maxPrice, $storeBooks)
    {
        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
    }
    public function generate(): \Generator
    {
        foreach ($this->libraryBooks as $libBook) {
            if ($libBook->getPrice()<= $this->maxPrice && $libBook->getPagesNumber()>= $this->minPagesNumber) {
                $this->filteredBooks[] = new Book($libBook->title, $libBook->price, $libBook->pagesNumber);
            }
        }
        foreach ($this->storeBooks as $storeBook) {
            if ($storeBook->getPrice()<= $this->maxPrice && $storeBook->getPagesNumber()>= $this->minPagesNumber) {
                $this->filteredBooks[] = new Book($storeBook->title, $storeBook->price,$storeBook->pagesNumber);
            }
        }
        foreach ($this->filteredBooks as $fltrdBook) {
            yield $fltrdBook;
        }
    }
}