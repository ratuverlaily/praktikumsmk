<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $register = [
		'username' => [
			'rules' => 'required|min_length[5]|is_unique[users.username]',
		],
		'password' => [
			'rules' => 'required',
		],
		'firstname' => [
			'rules' => 'required',
		],
		'lastname' => [
			'rules' => 'required',
		],
		'address' => [
			'rules' => 'required',
		],
		'age' => [
			'rules' => 'required|is_natural',
		]
	];

	public $update_user = [
		'username' => [
			'rules' => 'required|min_length[5]|is_unique[users.username,id,{id}]',
		],
		'password' => [
			'rules' => 'required',
		],
		'firstname' => [
			'rules' => 'required',
		],
		'lastname' => [
			'rules' => 'required',
		],
		'address' => [
			'rules' => 'required',
		],
		'age' => [
			'rules' => 'required|is_natural',
		]
	];
}
