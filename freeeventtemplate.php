<?php

require_once 'freeeventtemplate.civix.php';
use CRM_Freeeventtemplate_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/ 
 */
function freeeventtemplate_civicrm_config(&$config) {
  _freeeventtemplate_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function freeeventtemplate_civicrm_xmlMenu(&$files) {
  _freeeventtemplate_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function freeeventtemplate_civicrm_install() {
  _freeeventtemplate_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function freeeventtemplate_civicrm_postInstall() {
  _freeeventtemplate_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function freeeventtemplate_civicrm_uninstall() {
  _freeeventtemplate_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function freeeventtemplate_civicrm_enable() {
  _freeeventtemplate_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function freeeventtemplate_civicrm_disable() {
  _freeeventtemplate_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function freeeventtemplate_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _freeeventtemplate_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function freeeventtemplate_civicrm_managed(&$entities) {
  _freeeventtemplate_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function freeeventtemplate_civicrm_caseTypes(&$caseTypes) {
  _freeeventtemplate_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function freeeventtemplate_civicrm_angularModules(&$angularModules) {
  _freeeventtemplate_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function freeeventtemplate_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _freeeventtemplate_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function freeeventtemplate_civicrm_entityTypes(&$entityTypes) {
  _freeeventtemplate_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function freeeventtemplate_civicrm_themes(&$themes) {
  _freeeventtemplate_civix_civicrm_themes($themes);
}

  function freeeventtemplate_civicrm_buildForm($formName, &$form) {
    if ($formName == "CRM_Event_Form_ManageEvent_EventInfo") {
      if (!empty($form->getVar('_isTemplate'))) {
        $form->addYesNo('free_event', ts('Free Event?'));
        CRM_Core_Region::instance('page-body')->add(array(
          'template' => 'CRM/FreeEvent.tpl',
        ));
      }
    }
    if (get_class($form) == "CRM_Event_Form_Registration_Register") {
      $templateId = "";
      if ($templateId) {
        $template = getEventTemplates($templateId);
        if (in_array($template, $zeroTemplates)) {
          foreach ($amount as $key => &$val) {
            $val['is_display_amounts'] = 0;
            foreach ($val['options'] as $pid => &$pf) {
              $pf['amount'] = 0.00;
            }
          }
        }
      }
    }
  }

  function freeeventtemplate_civicrm_postProcess($formName, &$form) {
    if ($formName == "CRM_Event_Form_ManageEvent_EventInfo") {
      if (array_key_exists('free_event', $form->_submitValues)) {
        $eventId = CRM_Core_Session::singleton()->get('eventID');
        $freeEvent = new CRM_Freeeventtemplate_DAO_FreeEvent();
        $freeEvent->event_id = $eventId;
        $freeEvent->find(TRUE);
        $freeEvent->free_event = $form->_submitValues['free_event'];
        $freeEvent->save();
      }
    }
  }

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function freeeventtemplate_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function freeeventtemplate_civicrm_navigationMenu(&$menu) {
  _freeeventtemplate_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _freeeventtemplate_civix_navigationMenu($menu);
} // */
