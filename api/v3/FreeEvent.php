<?php
use CRM_Freeeventtemplate_ExtensionUtil as E;

/**
 * FreeEvent.create API specification (optional).
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/api-architecture/
 */
function _civicrm_api3_free_event_create_spec(&$spec) {
  // $spec['some_parameter']['api.required'] = 1;
}

/**
 * FreeEvent.create API.
 *
 * @param array $params
 *
 * @return array
 *   API result descriptor
 *
 * @throws API_Exception
 */
function civicrm_api3_free_event_create($params) {
  return _civicrm_api3_basic_create(_civicrm_api3_get_BAO(__FUNCTION__), $params, FreeEvent);
}

/**
 * FreeEvent.delete API.
 *
 * @param array $params
 *
 * @return array
 *   API result descriptor
 *
 * @throws API_Exception
 */
function civicrm_api3_free_event_delete($params) {
  return _civicrm_api3_basic_delete(_civicrm_api3_get_BAO(__FUNCTION__), $params);
}

/**
 * FreeEvent.get API.
 *
 * @param array $params
 *
 * @return array
 *   API result descriptor
 *
 * @throws API_Exception
 */
function civicrm_api3_free_event_get($params) {
  $isfree = _checkFreeEvent($params['event_id']);
  return civicrm_api3_create_success($isfree, $params, 'FreeEvent');
}
