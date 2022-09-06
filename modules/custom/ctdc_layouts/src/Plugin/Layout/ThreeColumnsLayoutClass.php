<?php

namespace Drupal\ctdc_layouts\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Alternate class for custom three columns layout.
 */
class ThreeColumnsLayoutClass extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'column_width' => 'equal_columns',
      'bg_color' => 'bg-white',
      'unique_id' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $configuration = $this->getConfiguration();
    $form['column_width'] = [
      '#type' => 'select',
      '#title' => $this->t('Choose column width'),
      '#options' => [
        'equal_columns' => $this->t('Equal columns'),
        '25_50_25' => $this->t('25%-50%-25%'),
        '50_25_25' => $this->t('50%-25%-25%'),
      ],
      '#default_value' => $configuration['column_width'],
    ];
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
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['column_width'] = $form_state->getValue('column_width');
    $this->configuration['bg_color'] = $form_state->getValue('bg_color');
    $this->configuration['unique_id'] = $form_state->getValue('unique_id');
    parent::submitConfigurationForm($form, $form_state);
  }

}
