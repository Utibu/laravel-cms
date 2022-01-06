<?php

namespace App\Models\Sections;

use App\Models\SectionFields\TextField;

class TextSection
{
  protected string $name = "Text";
  protected string $description = "Text description";

  public array $fields = [];

  public function __construct() {
    $this->fields = [
      [
        'field' => new TextField(),
        'key' => 'title',
        'name' => 'Title',
        'description' => 'A title',
      ]
    ];
  }
}
