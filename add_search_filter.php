<?php

$config = \Drupal::configFactory()->getEditable('views.view.exhibits');
$view = $config->get();

$view['display']['default']['display_options']['filters']['title_1'] = [
  'id' => 'title_1',
  'table' => 'node_field_data',
  'field' => 'title',
  'relationship' => 'none',
  'group_type' => 'group',
  'admin_label' => 'Search Exhibits',
  'entity_type' => 'node',
  'entity_field' => 'title',
  'plugin_id' => 'string',
  'operator' => 'contains',
  'value' => '',
  'group' => 1,
  'exposed' => true,
  'expose' => [
    'operator_id' => 'title_1_op',
    'label' => 'Search Exhibits',
    'description' => '',
    'use_operator' => false,
    'operator' => 'title_1_op',
    'operator_limit_selection' => false,
    'operator_list' => [],
    'identifier' => 'title',
    'reduce' => false,
    'remember' => false,
    'multiple' => false,
    'required' => false,
    'placeholder' => 'Search exhibits...',
  ],
];

$config->setData($view)->save();

print "Search filter saved.\n";
