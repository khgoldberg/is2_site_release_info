<?php

namespace Drupal\is2_site_release_info\Service;

use Drupal\Core\Security\TrustedCallbackInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

class ReleaseInfoToolbarDataBuilder implements TrustedCallbackInterface {

  use StringTranslationTrait;

  /**
   * {@inheritDoc}
   */
  public static function trustedCallbacks(): array {
    return ['renderReleaseInformation'];
  }

  /**
   * Renders the release information.
   *
   * This method returns an array containing the release information.
   *
   * Example output:
   * ```
   * [
   *   '#markup' => t('Release 1.0.0'),
   * ]
   * ```
   *
   * @return array
   *   An array containing the release information.
   */
  public function renderReleaseInformation(): array {
    // Read the RELEASE FILE if present.
    return [
      '#markup' => $this->t('Release 1.0.0'),
    ];
  }
}
