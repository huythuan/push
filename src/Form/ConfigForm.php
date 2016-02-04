<?php
namespace Drupal\push\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase {
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Form\FormInterface::getFormId()
   */
  public function getFormId() {
    return 'push_config';
  }
  /**
   * 
   * @return string[]
   */
  protected function getEditableConfigNames() {
    return ['push.settings'];
  }
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Form\ConfigFormBase::buildForm()
   */
  public  function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('push.settings');
    
    $form['push_number'] = [
      '#type' => 'number',
      '#title' => $this->t('Push Number'),
      '#default_value' => $config->get('default_number'),
    ];
    return parent::buildForm($form, $form_state);
  }
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Form\ConfigFormBase::submitForm()
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $config = $this->config('push.settings');
    $config->set('default_number', $form_state->getValue('push_number'));
    $config->save();
  }
}