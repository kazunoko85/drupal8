<?php
/**
 * @file
 * Contains Drupal\picture_manager\Controller\PictureManagerController.
 */

namespace Drupal\picture_manager\Controller;

use Drupal\Core\Controller\ControllerBase;

class PictureManagerController extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, World!'),
    );
  }
}
?>