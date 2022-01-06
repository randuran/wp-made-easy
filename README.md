# WP | My Workflow

A brief description of what this project does and who it's for

## Custom Post Types

```php
use Randyduran\Traits\WithPostType;

class Example() {

  use WithPostType; //Include the custom post type trait

  public function foo()
  {
    $this->postTypes[]; //register the custom post type
  }
}

