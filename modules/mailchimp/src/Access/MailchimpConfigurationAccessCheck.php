<?php
/**
 * @file
 * Contains \Drupal\mailchimp\Access\MailchimpConfigurationAccessCheck.
 */

namespace Drupal\mailchimp\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Routing\Access\AccessInterface;

/**
 * Checks access for displaying configuration translation page.
 */
class MailchimpConfigurationAccessCheck implements AccessInterface {

  /**
   * Access check for MailChimp module configuration.
   *
   * Ensures a MailChimp API key has been provided.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account) {
    $config = \Drupal::config('mailchimp.settings');

    return AccessResult::allowedIf(!empty($config->get('api_key')));
  }

}
