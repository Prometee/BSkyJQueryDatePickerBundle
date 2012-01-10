<?php
namespace BSky\Bundle\JQueryDatePickerBundle\Form\Extension\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class JQueryDateTimePickerType extends DateTimeType {
	/**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options) {
		parent::buildForm($builder, $options);		
        $builder->setAttribute('jquery_datetimepicker', json_encode($options['jquery_datetimepicker']));
    }
	
	/**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form) {
        $view->set('jquery_datetimepicker', $form->getAttribute('jquery_datetimepicker'));
    }
	
	/**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options) {
		$default_options = parent::getDefaultOptions($options);
		$default_options['widget'] = 'choice';
		$default_options['jquery_datetimepicker'] = array(
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
        return 'bsky_jquerydatetimepicker';
    }
}