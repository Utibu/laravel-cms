<?php

namespace App\Models\SectionFields;

class TextField extends SectionField
{
  protected string $name = "text";
  protected string $description = "Text description";

  public string $text = "";
  
  public function getFormattedValue() {
    return $this->text;
  }
}
