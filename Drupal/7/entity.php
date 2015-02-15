<?php

/**
 * Implements hook_entity_info()
 */
function module_name_entity_info() {
  $info = array();

  $info['custom_entity'] = array(
      'label'            => '…',
      'plural label'     => '…',
      'description'      => '…',
      'entity class'     => 'CustomEntity', // extends Entity
      'controller class' => 'FieldIndexController', // extends EntityAPIController or EntityAPIControllerExportable 
      'base table'       => 'module_name_custom_entity',
      'fieldable'        => FALSE,
      'exportable'       => TRUE,
      'entity keys'      => array('id' => 'id', 'name' => 'name', 'label' => 'label'),
      'access callback'  => 'module_name_custom_entity_access_callback',
      'module'           => 'module_name',
      'admin ui'         => array(
          'path' => 'admin/structure/custom-entity',
          'file' => 'module_name.pages.inc',
      ),
  );

  return $info;
}

/**
 * @see entity_ui_get_form()
 * $form_id = (!isset($bundle) || $bundle == $entity_type) 
 *    ? $entity_type . '_form' 
 *    : $entity_type . '_edit_' . $bundle . '_form';
 */
function custom_entity_form($form, &$form_state, $template, $op = 'edit') {
  // …
}

/**
 * Submmit handler.
 */
function custom_entity_form_submit($form, &$form_state) {
  $template = entity_ui_controller('custom_entity')->entityFormSubmitBuildEntity($form, $form_state);
  $template->save();
  $form_state['redirect'] = 'admin/structure/custom-entity';
}

/**
 * @param $op
 *   The operation being performed. One of 'view', 'update', 'create' or 'delete'.
 */
function module_name_custom_entity_access_callback($op, $entity, $account, $entity_type) {
  return TRUE;
}
