## Setup
Just install the plugin and go to "Catalog -> Products -> Reorder products (list toolbar)"

## Added sort options
- custom
- alphabetically

## Custom sort
```php
$obList = ProductCollection::make()->sort('custom');
```

## Alphabetically sort
```php
$obList = ProductCollection::make()->sort('alphabetically');
```