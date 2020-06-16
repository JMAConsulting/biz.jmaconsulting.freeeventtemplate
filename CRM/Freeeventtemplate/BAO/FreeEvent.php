<?php
use CRM_Freeeventtemplate_ExtensionUtil as E;

class CRM_Freeeventtemplate_BAO_FreeEvent extends CRM_Freeeventtemplate_DAO_FreeEvent {

  /**
   * Create a new FreeEvent based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Freeeventtemplate_DAO_FreeEvent|NULL
   *
  public static function create($params) {
    $className = 'CRM_Freeeventtemplate_DAO_FreeEvent';
    $entityName = 'FreeEvent';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}
