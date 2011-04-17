<?php 

require_once('../../Smoke.class.php');

/*
	The form_validation library is loaded automatically upon use
	This library automatically loads the form helper also
	
	set_rules like this:
	set_rules(field_name, pretty_name, rules)
	
	To see a list of the built in rules, view the Code Igniter docs here:
	http://codeigniter.com/user_guide/libraries/form_validation.html#rulereference
*/
smoke()->form_validation->set_rules('username', 'Username', 'required');
smoke()->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
smoke()->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[passconf]');
smoke()->form_validation->set_rules('email', 'Email', 'required|valid_email');

// Put your stuff into a str to display it
$default = <<< HTML
	<head>
		<style>
			form { width: 500px; }
			label { display: block;float: left;clear: both;text-align: right;width: 30%;margin: 0 6px 0 0; }
			input, reset, button { margin: 10px;display: block; }
			.error { color: red; }
		</style>
	</head>
	<div>
		<h2>Form Validation</h2>
		<div class="error">
			{* Prints out the validation errors *}
			{validation_errors()}			
		</div>
		{* Opens the form with the action set to the CI site_url + argument *}
		{form_open('examples/libraries/form_validation.php')}
		{form_fieldset('Info')}
		<p>		
			{form_label('Username: ', 'username')}
			{form_input('username')}
			{form_label('Password: ', 'password')}
	  		{form_input('password')}
			{form_label('Confirm Password: ', 'passconf')}
	  		{form_input('passconf')}
			{form_label('Email: ', 'email')}
	  		{form_input('email')}
	  		{form_reset('reset', 'Reset')}
	  		{form_submit('submit', 'Submit')}
	  	</p>
	  	{form_fieldset_close()}
	  	{form_close()}
		
	</div>	
HTML;

$success = '<h2>Success!</h2>';

// Run the form validation
if (smoke()->form_validation->run() == TRUE) 
{ 
	// If the validation succeeds, load this template
	smoke()->smarty->display_str("$success"); 
} else { 
	// If it fails, load this template
	smoke()->smarty->display_str("$default"); 
}

?>