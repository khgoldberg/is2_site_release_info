<?php

namespace Drupal\is2_site_release_info\Service;

use Drupal\Core\Security\TrustedCallbackInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Release information generation lazy builder class.
 *
 * This class is responsible for rendering the release information
 * for the toolbar.
 *
 * @package is2_site_release_info
 */
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
   * @return array
   *   Array containing the markup.
   */
  public function renderReleaseInformation(): array {
    // Read the RELEASE FILE if present.
    $version = $this->readReleaseFile();
    return [
      '#markup' => $version,
      '#attached' => [
        'library' => [
          'is2_site_release_info/global_style',
        ],
      ],
    ];
  }

  /**
   * Reads the release file and returns the version number.
   *
   * This method reads the release file and returns the version number
   * if the file exists and is readable. If the file does not exist or
   * is not readable, this method will return NULL.
   *
   * @return string|null
   *   The version number if the release file exists and is readable, else NULL.
   */
  protected function readReleaseFile() :? string {
    $releaseFile = dirname(DRUPAL_ROOT, 1) . '/RELEASE.md';
    if (file_exists($releaseFile) && is_readable($releaseFile)) {
      $content = file_get_contents($releaseFile);
      $parsedContent = explode(PHP_EOL, $content);
      if (!empty($parsedContent)) {
        // Version is on the second line.
        $version = trim($parsedContent[1]);
        return ucfirst(trim(preg_replace('/[^A-Za-z0-9 .\-]/', '', $version)));
      }
      return NULL;
    }
    return NULL;
  }

}
