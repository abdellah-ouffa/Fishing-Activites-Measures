<?php

namespace App\Helpers;

/**
 * Constants classes
 */
class Constant
{
	/*
	* Default count data per page
	*/
	public const COUNT_PER_PAGE = 10;

	/**
	* User Roles
	**/
	public const USER_ROLES = [
		'admin' => 'admin',
		'agent' => 'agent',
	];

	/*
	* Default date format
	*/
	public const DATE_FORMAT = 'd/m/Y';

	/*
	* Default measure attributes
	*/
	public const DEFAULT_MEASURE_ATTRIBUTES = [
		'Effort de pêche',
		'Quota',
		'Mailing',
		'Engins de pêche',
		'Période d’interdiction',
		'Taille réglementaire',
		'Entité de gestion',
		'Référence réglementaire ',
	];
}
