<?php

namespace Drupal\event_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * ExampleForm class.
 */
class ApplyButtonForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $event_id = NULL, $event_title = NULL) {
    $form['open_modal'] = [
      '#type' => 'link',
      '#title' => $this->t('Participate'),
      '#url' => Url::fromRoute('event_forms.open_modal_form', ['event_id' => $event_id, 'event_title' => $event_title]),
      '#attributes' => [
        'class' => [
          'use-ajax',
          'link',
        ],
      ],
    ];
    // Attach the library for pop-up dialogs/modals.
    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'event_forms_apply_button_form';
  }


}
