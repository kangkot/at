<?php

// Get entity info
$info = entity_get_info();

// Get fields created in a bundle
$instances = field_info_instances($entity_type = NULL, $bundle_name = NULL);

// Get schema in a field
$field_info = field_info_field($field_name);
