<?php

/**
 * @file
 * Contains \Drupal\kazunoko_block\Plugin\Block\KazunokoBlock.
 */

namespace Drupal\kazunoko_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'Kazunoko' block.
 *
 *
 * @Block(
 *   id = "kazunoko_block",
 *   admin_label = @Translation("sample kazunoko block"),
 * )
 */
class KazunokoBlock extends BlockBase {

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
      '#markup' => $this->configuration['text'],
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
      'text' => t('Drupal!'),
      'checkbox' => 1,
      'radio' => 0,
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
    $form['text'] = array(
      '#type' => 'textfield',
      '#title' => t('text'),
      '#default_value' => $this->configuration['text'],
    );

    $form['checkbox'] = array(
      '#type' => 'checkbox',
      '#title' => t('checkbox'),
      '#default_value' => $this->configuration['checkbox'],
    );

    $form['radio'] = array(
      '#type' => 'radios',
      '#title' => t('radio'),
      '#options' => array(
        1 => t('yes'),
        0 => t('no')
      ),
      '#default_value' => $this->configuration['radio'],
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public
  function blockSubmit($form, FormStateInterface $form_state) {
    // Save our custom settings when the form is submitted.
    $this->setConfigurationValue('text', $form_state->getValue('text'));
    $this->setConfigurationValue('checkbox', $form_state->getValue('checkbox'));
    $this->setConfigurationValue('radio', $form_state->getValue('radio'));
  }
}