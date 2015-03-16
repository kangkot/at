## Plugin API

### 1. hook_ctools_plugin_type

- [API](http://j.mp/1Lh5vnW)
- [Help](http://j.mp/1AtHOi2)

### 2. Implement a plugin

There are two way to do

#### 2.1. Implement hook_MODULE_PLUGIN

If module owner is 'example' and plugin type is 'hello', then the implementation should be:

```php
function my_module_example_hello() {
  return [
    'vietnamese' => [
      'label' => t('Vietnamese'),
      'handler' => [
        'class' => 'SayHelloInVietnamese',
      ]
    ]
  ];
}
```

#### 2.2. Define implementation in file

First, we have to implements hook_ctools_plugins_directory

```php
function my_module_ctools_plugin_directory() {
  if (($module == 'example') && ($plugin == 'hello')) {
    return 'plugins/hello';
  }
}
```

Then, create the file, write details

```php
// @file ./plugins/hello/vietnamese.inc

$plugin = array(
  'label' => t('Vietnamese'),
  'handler' => array(
    'class' => 'SayHelloInVietnamese',
  ),
);

class SayHelloInVietnamese implements ExampleHelloPluginInterface {
  public function sayHello() {
    return "Xin chào!";
  }
}

```

### 3. Load plugin implementations

```php
foreach (ctools_get_plugins('example', 'hello') as $hello_plugin) {
  $class = ctools_plugin_get_class($hello_plugin, 'handler');
  (new $class)->sayHello();
}
```

### 4. [Helper functions](http://drupalcontrib.org/api/drupal/contributions!ctools!includes!plugins.inc/7)

1. ctools_find_base_themes
1. ctools_get_plugins
1. ctools_get_plugins_reset
1. ctools_plugin_api_get_hook
1. ctools_plugin_api_include
1. ctools_plugin_api_info
1. ctools_plugin_get_class
1. ctools_plugin_get_directories
1. ctools_plugin_get_function
1. ctools_plugin_get_info
1. ctools_plugin_get_plugin_type_info
1. ctools_plugin_load_class
1. ctools_plugin_load_function
1. ctools_plugin_load_hooks
1. ctools_plugin_load_includes
1. ctools_plugin_process
1. ctools_plugin_process_info
1. ctools_plugin_sort
1. _ctools_list_themes
1. _ctools_process_data

