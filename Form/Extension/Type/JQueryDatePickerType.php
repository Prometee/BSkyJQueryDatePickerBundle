<?php
namespace BSky\Bundle\JQueryDatePickerBundle\Form\Extension\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class JQueryDatePickerType extends DateType {
	/**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options) {
		parent::buildForm($builder, $options);		
        $builder->setAttribute('jquery_datepicker', json_encode($options['jquery_datepicker']));
    }
	
	/**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form) {
        $view->set('jquery_datepicker', $form->getAttribute('jquery_datepicker'));
    }
	
	/**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options) {
		$default_options = parent::getDefaultOptions($options);
		$default_options['widget'] = 'choice';
		$default_options['jquery_datepicker'] = array(
			"showOn"=>"button",
			"buttonText"=>"...",
			"changeMonth"=>true,
			"changeYear"=>true
		);
		return $default_options;
	}
	
    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'bsky_jquerydatepicker';
    }
}