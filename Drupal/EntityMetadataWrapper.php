<?php

/**
 * Source: http://drupal.stackexchange.com/a/98514
 *
 * Generated from entity.test via:
 *  grep "^\W*\$wrapper->" entity/entity.test | tr -s " "
 */

$wrapper->author = 0;
$wrapper->url = 'dummy';
$wrapper->author->mail = 'foo';
$wrapper->author = NULL;
$wrapper->author->set($GLOBALS['user']->uid);
$wrapper->author->set($GLOBALS['user']);
$wrapper->body->set(array('value' => "<b>The second body.</b>"));
$wrapper->language('de');
$wrapper->body->set(array('value' => "<b>Der zweite Text.</b>"));
$wrapper->language(LANGUAGE_NONE);
$wrapper->set($node);
$wrapper->reference->name->set('foo');
$wrapper->reference->set($wrapper);
$wrapper->save();
$wrapper->delete();
$wrapper->type->set('article');
$wrapper->author = $user->uid;
$wrapper->{$property}[0] = '2009-10-05';
$wrapper->field_image = array('fid' => $file->fid);
$wrapper->$name->value();
$wrapper->parent[] = $term_parent2;
$wrapper->field_tags[1] = $term_parent;
$wrapper->field_tags->set(array(2));
$wrapper->field_tags = NULL;
$wrapper->$field_name->set(NULL);
$wrapper->field_text[0] = 'the text';
$wrapper->field_text[0]->set(array('value' => "<b>The second body.</b>"));
$wrapper->field_text2->summary = 'the summary';
$wrapper->field_text2->value = 'the text';
$wrapper->field_file[0] = array('fid' => $file->fid, 'display' => FALSE);
$wrapper->field_file[0]->description = 'foo';
$wrapper->field_file[0]->display = TRUE;
$wrapper->field_file[1]->file = $file;
$wrapper->field_file[] = array('description' => 'test');
$wrapper->field_file = NULL;
$wrapper->field_image = array('fid' => $file->fid);
$wrapper->field_image->alt = 'foo';
$wrapper->field_image->file = $file;
$wrapper->field_image = array();
