<?php

function my_module_views_data() {
  $data['my_table']['my_custom_column'] = [
      'field' => [
          'title'          => 'My field',
          'field'          => 'my_column',
          'handler'        => 'Drupal\my_module\ViewsHandler\MyCustomField',
          'click sortable' => TRUE,
      ],
  ];
  return $data;
}

namespace Drupal\my_module\ViewsHandler extends \views_handler_field {
  class MyCustomField {
    function query() {
      $table = $this->query->relationships['my_table']['table'];
      $join = new \views_join_complex();
      $join->construct('my_other_table', $table, 'my_column', 'my_column', array(), 'LEFT OUTER');
      $alias = $this->query->add_table('my_other_table', NULL, $join, "{$table}_other");
      $this->field_alias = $this->query->add_field(NULL, "{$alias}.my_column IS NOT NULL", "{$alias}_my_column");
      $this->add_additional_fields();
    }
  }
}
