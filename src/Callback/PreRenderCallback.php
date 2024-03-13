<?php

namespace Drupal\is2_site_release_info\Callback;

use Drupal\Core\Security\TrustedCallbackInterface;

/**
 * Class PreRender - Renders element of the toolbar item.
 *
 * This class implements the TrustedCallbackInterface.
 * It provides the static method trustedCallbacks() that needs to be implemented as per the interface.
 */
class PreRenderCallback implements TrustedCallbackInterface {

  /**
   * {@inheritDoc}
   */
  public static function trustedCallbacks(): array {
    return ['removeTabAttributes'];
  }

  /**
   * Render callback.
   */
  public static function removeTabAttributes(array $element): array {
    unset($element['tab']['#attributes']);
    return $element;
  }
}
