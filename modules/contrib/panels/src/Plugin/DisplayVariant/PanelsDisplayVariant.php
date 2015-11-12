<?php

/**
 * @file
 * Contains \Drupal\panels\Plugin\DisplayVariant\PanelsDisplayVariant.
 */

namespace Drupal\panels\Plugin\DisplayVariant;

use Drupal\Component\Uuid\UuidInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\Context\ContextHandlerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Utility\Token;
use Drupal\ctools\Plugin\DisplayVariant\BlockDisplayVariant;
use Drupal\layout_plugin\Layout;
use Drupal\layout_plugin\Plugin\Layout\LayoutPluginManagerInterface;
use Drupal\panels\Plugin\DisplayBuilder\DisplayBuilderManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a display variant that simply contains blocks.
 *
 * @DisplayVariant(
 *   id = "panels_variant",
 *   admin_label = @Translation("Panels")
 * )
 */
class PanelsDisplayVariant extends BlockDisplayVariant {

  /**
   * The display builder plugin manager.
   *
   * @var \Drupal\panels\Plugin\DisplayBuilder\DisplayBuilderManagerInterface
   */
  protected $builderManager;

  /**
   * The display builder plugin.
   *
   * @var \Drupal\panels\Plugin\DisplayBuilder\DisplayBuilderInterface
   */
  protected $builder;

  /**
   * The layout plugin manager.
   *
   * @var \Drupal\layout_plugin\Plugin\Layout\LayoutPluginManagerInterface;
   */
  protected $layoutManager;

  /**
   * The layout plugin.
   *
   * @var \Drupal\layout_plugin\Plugin\Layout\LayoutInterface
   */
  protected $layout;

  /**
   * Constructs a new PanelsDisplayVariant.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Plugin\Context\ContextHandlerInterface $context_handler
   *   The context handler.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The current user.
   * @param \Drupal\Component\Uuid\UuidInterface $uuid_generator
   *   The UUID generator.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\Component\Uuid\UuidInterface $uuid_generator
   *   The UUID generator.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\panels\Plugin\DisplayBuilder\DisplayBuilderManagerInterface $builder_manager
   *   The display builder plugin manager.
   * @param \Drupal\layout_plugin\Plugin\Layout\LayoutPluginManagerInterface $layout_manager
   *   The layout plugin manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ContextHandlerInterface $context_handler, AccountInterface $account, UuidInterface $uuid_generator, Token $token, DisplayBuilderManagerInterface $builder_manager, LayoutPluginManagerInterface $layout_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $context_handler, $account, $uuid_generator, $token);

    $this->builderManager = $builder_manager;
    $this->layoutManager = $layout_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('context.handler'),
      $container->get('current_user'),
      $container->get('uuid'),
      $container->get('token'),
      $container->get('plugin.manager.panels.display_builder'),
      $container->get('plugin.manager.layout_plugin')
    );
  }

  /**
   * Returns the builder assigned to this display variant.
   *
   * @return \Drupal\panels\Plugin\DisplayBuilder\DisplayBuilderInterface
   *   A display builder plugin instance.
   */
  public function getBuilder() {
    if (!isset($this->builder)) {
      $this->builder = $this->builderManager->createInstance($this->configuration['builder'], []);
    }
    return $this->builder;
  }

  /**
   * Returns instance of the layout plugin used by this page variant.
   *
   * @return \Drupal\layout_plugin\Plugin\Layout\LayoutInterface
   *   A layout plugin instance.
   */
  public function getLayout() {
    if (!isset($this->layout)) {
      $this->layout = $this->layoutManager->createInstance($this->configuration['layout'], []);
    }
    return $this->layout;
  }

  /**
   * {@inheritdoc}
   */
  public function getRegionNames() {
    return $this->getLayout()->getPluginDefinition()['region_names'];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $regions = $this->getRegionAssignments();
    $contexts = $this->getContexts();
    $layout = $this->getLayout();
    $build = $this->getBuilder()->build($regions, $contexts, $layout);
    $build['#title'] = $this->renderPageTitle($this->configuration['page_title']);
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    // Allow to configure the page title, even when adding a new display.
    // Default to the page label in that case.
    $form['page_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Page title'),
      '#description' => $this->t('Configure the page title that will be used for this display.'),
      '#default_value' => $this->configuration['page_title'] ?: '',
    ];

    if (!$this->id()) {
      $plugins = $this->builderManager->getDefinitions();
      $options = array();
      foreach ($plugins as $id => $plugin) {
        $options[$id] = $plugin['label'];
      }
      $form['builder'] = [
        '#title' => $this->t('Builder'),
        '#type' => 'select',
        '#options' => $options,
        '#default_value' => 'standard',
      ];

      $form['layout'] = [
        '#title' => $this->t('Layout'),
        '#type' => 'select',
        '#options' => Layout::getLayoutOptions(['group_by_category' => TRUE]),
        '#default_value' => NULL
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    if ($form_state->hasValue('layout')) {
      $this->configuration['layout'] = $form_state->getValue('layout');
    }

    if ($form_state->hasValue('builder')) {
      $this->configuration['builder'] = $form_state->getValue('builder');
    }

    if ($form_state->hasValue('page_title')) {
      $this->configuration['page_title'] = $form_state->getValue('page_title');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function access(AccountInterface $account = NULL) {
    // If no blocks are configured for this variant, deny access.
    if (empty($this->configuration['blocks'])) {
      return FALSE;
    }

    return parent::access($account);
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'layout' => '',
      'page_title' => '',
    ];
  }

  /**
   * Renders the page title and replaces tokens.
   *
   * @param string $page_title
   *   The page title that should be rendered.
   *
   * @return string
   *   The page title after replacing any tokens.
   */
  protected function renderPageTitle($page_title) {
    $data = $this->getContextAsTokenData();
    return $this->token->replace($page_title, $data);
  }

  /**
   * Returns available context as token data.
   *
   * @return array
   *   An array with token data values keyed by token type.
   */
  protected function getContextAsTokenData() {
    $data = array();
    foreach ($this->getContexts() as $context) {
      // @todo Simplify this when token and typed data types are unified in
      //   https://drupal.org/node/2163027.
      if (strpos($context->getContextDefinition()->getDataType(), 'entity:') === 0) {
        $token_type = substr($context->getContextDefinition()->getDataType(), 7);
        if ($token_type == 'taxonomy_term') {
          $token_type = 'term';
        }
        $data[$token_type] = $context->getContextValue();
      }
    }
    return $data;
  }

}
