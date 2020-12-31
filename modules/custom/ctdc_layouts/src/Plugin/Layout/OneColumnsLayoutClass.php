<?php

namespace Drupal\ctdc_layouts\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Alternate class for custom three columns layout.
 */
class OneColumnsLayoutClass extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'bg_color' => 'bg-white',
      'is_sticky' => 'not-sticky',
      'unique_id' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();
    $form['unique_id'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Choose a unique ID for this section'),
    ];
    $form['bg_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Choose background color'),
      '#options' => [
        'bg-white' => $this->t('White'),
        'bg-grey--light' => $this->t('Grey (Light)'),
        'bg-grey--dark' => $this->t('Grey (Dark)'),
        'bg-blue--clearwater' => $this->t('Blue (Clear Water)'),
        'bg-blue--deepSky' => $this->t('Blue (Light)'),
        'bg-blue--persian' => $this->t('Blue (Light)'),
        'bg-black' => $this->t('Black'),

      ],
      '#default_value' => $configuration['bg_color'],
    ];
    $form['is_sticky'] = [
      '#type' => 'select',
      '#title' => $this->t('Choose background color'),
      '#options' => [
        'sticky' => $this->t('Sticky'),
        'not-sticky' => $this->t('Not Sticky'),

      ],
      '#default_value' => $configuration['is_sticky'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['bg_color'] = $form_state->getValue('bg_color');
    $this->configuration['is_sticky'] = $form_state->getValue('is_sticky');
    $this->configuration['unique_id'] = $form_state->getValue('unique_id');
    parent::submitConfigurationForm($form, $form_state);
  }

}
