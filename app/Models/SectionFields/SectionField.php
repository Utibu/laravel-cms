<?php

namespace App\Models\SectionFields;

class SectionField
{
  protected string $name;
  protected string $description;
  protected string $viewName;
  protected array $viewData = [];

  protected string $key = "";

  public function __construct() {
    if(empty($this->viewName)) $this->viewName = $this->name;
  }
  
  public function getFormattedValue() {
    return [];
  }

  public function getView(string $key) {
    return view('admin.fields.' . $this->viewName)->with('key', $key);
  }
}
