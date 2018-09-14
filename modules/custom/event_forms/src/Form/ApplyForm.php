<?php

namespace Drupal\event_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Url;

/**
 * SendToDestinationsForm class.
 */
class ApplyForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'popup_forms_apply_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $event_id = NULL, $event_title = NULL) {
    
    $form['#prefix'] = '<div id="modal_example_form"><div id="err" style="color:red;"></div>';
    $form['#suffix'] = '</div>';
    
    $form['event_id'] = array(
      '#type' => 'hidden',
      '#value' => $event_id,
    );

    $form['event_title'] = array(
      '#type' => 'hidden',
      '#value' => $event_title,
    );
    
    $form['apply_form'] = [
       '#type' => 'item',
       '#markup' => t('Participating for '. $event_title),
    ];

    $form['full_name'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#attributes' => ['placeholder' => t('Full Name*')]
    );
    $form['email'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#attributes' => ['placeholder' => t('Email*')]
    );

    $form['phone'] = array(
      '#type' => 'number',
      '#required' => TRUE,
      '#attributes' => ['placeholder' => t('Phone*')]
    );

    $form['address'] = array(
      '#type' => 'textarea',
      '#attributes' => ['placeholder' => t('Address')]
    );

    $form['remarks'] = array(
      '#type' => 'textarea',
      '#attributes' => ['placeholder' => t('Interested in specific department (Remarks – optional)')]
    );

    $form['actions'] = array('#type' => 'actions');

    $form['actions']['send'] = [
      '#type' => 'submit',
      '#value' => $this->t('Apply'),
      '#attributes' => [
        'class' => [
          'use-ajax',
        ],
      ],
      '#ajax' => [
        'callback' => [$this, 'submitModalFormAjax'],
        'event' => 'click',
      ],
    ];

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  /**
   * AJAX callback handler that displays any errors or a success message.
   */
  public function submitModalFormAjax(array $form, FormStateInterface $form_state) {
   $ajax_response = new AjaxResponse();
   $redirect = FALSE;
   $email = $form_state->getValue('email');

   if (empty($form_state->getValue('full_name'))) {
     $text = "<p>Please enter full name.</p>";
   } 
   if (!valid_email_address($email) || empty($email)) {
     $text .= "<p>Please enter a valid email.</p>";
   } 

   if (empty($form_state->getValue('phone'))) {
     $text .= "<p>Please enter phone details.</p>";
   }

   if(empty($text)) { 

     $job = array(
      'full_name' => $form_state->getValue('full_name'),
      'email' => $form_state->getValue('email'),
      'phone' => $form_state->getValue('phone'),
      'address' => $form_state->getValue('address'),
      'remarks' => $form_state->getValue('remarks'),
    );

     $query = \Drupal::database()->insert('event_users')
     ->fields([
      'full_name' => $job['full_name'],
      'email' => $job['email'],
      'phone' => $job['phone'],
      'address' => $job['address'],
      'remarks' => $job['remarks'],
    ])
     ->execute();    
     if ($query) {
      drupal_set_message(t('Your application entry added to database.We will contact you soon.'));
       $text .= "<p>Your application entry added to database.We will contact you soon.</p>";
        $redirect = TRUE;
      } else {
        drupal_set_message(t('There is problem in sending details.'));
         $text .= "<p>There is problem in sending details.</p>";
        $redirect = TRUE;
      }

    } 
  $ajax_response->addCommand(new HtmlCommand('#err', $text));
  if($redirect == TRUE){
   global $base_url;
   $url = $base_url .'/events-list';
   $ajax_response->addCommand(new RedirectCommand($url));
 }
 return $ajax_response;
}

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {}

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}


 

}
