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
	* User genders
	**/
	public const USERS_GENDERS = [
		'M',
		'F'
	];

	/**
	* User Roles
	**/
	public const USER_ROLES = [
		'admin' => 'admin',
		'teacher' => 'teacher',
		'student' => 'student'
	];

	/*
	* Default date format
	*/
	public const DATE_FORMAT = 'd/m/Y';

	public const DEFAULT_COLORS = [
		'colors' => ['#2992d5', '#6b90a1', '#135388', '#2992d5', '#6b90a1', '#135388'],
		'backgrounds' => ['#c9e4f5', '#dae5ea', '#cad9e6', '#c9e4f5', '#dae5ea', '#cad9e6'],
	];

	/*
	* Installation configuration
	*/
	public const DEFAULT_LEVELS_SUBLEVELS = [
		'Primaire' => ['1er annee', '2eme annee', '3eme annee', '4eme annee', '5eme annee', '6eme annee'],
		'College' => ['1er annee', '2eme annee', '3eme annee'],
		'Lycee' => ['1er annee', '2eme annee', '3eme annee'],
		'Deug' => ['S1', 'S2', 'S3', 'S4'],
		'Licence' => ['S5', 'S6'],
		'Master' => ['M1', 'M2']
	];
}
