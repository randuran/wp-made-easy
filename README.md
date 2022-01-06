# WP | My Workflow

A brief description of what this project does and who it's for

### 1. Custom Post Types

```php
use Randyduran\Traits\WithPostType;

class Example() {

  use WithPostType; //Include the custom post type trait

  public function foo()
  {
    $this->postTypes[]; //register the custom post type
  }
}
```

### 2. Custom Tanoxomies

```php
use Randyduran\Traits\WithTaxonomy;

class Example() {

  use WithTaxonomy; //Include the taxonomy trait

  public function foo()
  {
    $this->taxonomies[]; //register the taxonomies
  }
}
```

### 3. Custom Tanoxomies

```php
use Randyduran\Traits\WithShortcode;

class Example() {

  use WithShortcode; //Include the shortcode trait

  public function foo()
  {
    $this->shortcodes[]; //register the shortcodes
  }
}
```


