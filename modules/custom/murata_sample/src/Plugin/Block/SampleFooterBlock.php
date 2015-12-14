<?php

/**
 * @file
 * Contains \Drupal\murata_sample\Plugin\Block\SampleFooterBlock.
 */

namespace Drupal\murata_sample\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'SampleFooter' block.
 *
 * @Block(
 *   id = "murata_sample",
 *   admin_label = @Translation("Murata Sample"),
 * )
 */
class SampleFooterBlock extends BlockBase {

  /**
   * Builds and returns the renderable array for this block plugin.
   *
   * If a block should not be rendered because it has no content, then this
   * method must also ensure to return no content: it must then only return an
   * empty array, or an empty array with #cache set (with cacheability metadata
   * indicating the circumstances for it being empty).
   *
   * @return array
   *   A renderable array representing the content of the block.
   *
   * @see \Drupal\block\BlockViewBuilder
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => 'I am ' . $this->configuration['who_am_i'].date('Y/m/d m:s'),
      '#cache' => array(
        'contexts' => array('user'),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'who_am_i' => t('Drupal!'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    // Retrieve existing configuration for this block.
    $config = $this->getConfiguration();

    // Add a form field to the existing block configuration form.
    $form['who_am_i'] = array(
      '#type' => 'textfield',
      '#title' => t('Who am I?'),
      '#default_value' => $this->configuration['who_am_i'],
    );
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    // Save our custom settings when the form is submitted.
    $this->setConfigurationValue('who_am_i', $form_state->getValue('who_am_i'));
  }
}