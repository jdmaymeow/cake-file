# CakeFile plugin for CakePHP


## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require jdmaymeow/cake-file
```

## File uploading

This package contain `UploaderCompoent` to use it, add to your controller

```php
$this->loadComponent('CakeFile.Uploader', [
    'upload_domain' => 'nodes',
    'upload_dir' => 'images'
]);
```

And call upload in your function for example

```php
$node->attribute_image = $this->Uploader->upload($node->image);
```
