<?php

class Pagination
{
  public $count_pages;
  public $current_page;
  public $page;
  public $per_page;
  public $total;


  public function __construct($page, $per_page, $total)
  {
    $this->page = $page;
    $this->per_page = $per_page;
    $this->total = $total;

    $this->count_pages = $this->get_count_pages();
    $this->current_page = $this->get_current_page();
  }


  public function get_start()
  {
    return ($this->current_page - 1) * $this->per_page;
  }

  public function get_count_pages()
  {
    return  ceil($this->total / $this->per_page);
  }

  public function get_current_page()
  {
    if ($this->page < 1) {
      $this->page = 1;
    }
    if ($this->page > $this->count_pages) {
      $this->page = $this->count_pages;
    }
    return $this->page;
  }
}
