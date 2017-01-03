<?php

return array(

	/*
	 * 角色模型
	*/
	'role' => 'App\Models\Access\Role\Role',

	/*
	 * 角色模型用的表.
	 */
	'roles_table' => 'roles',

	/*
	 * 权限模型路径
	 */
	'permission' => 'App\Models\Access\Permission\Permission',

	/*
	 * 权限模型用表
	 */
	'permissions_table' => 'permissions',

	/*
	 * 权限组
	 */
	'group' => 'App\Models\Access\Permission\PermissionGroup',

	/*
	 * 权限组模型用表
	 */
	'permission_group_table' => 'permission_groups',

	/*
	 * 权限角色关联表
	 */
	'permission_role_table' => 'permission_role',

	/*
	 * 权限用户关联表
	 * 
	 */
	'permission_user_table' => 'permission_user',

	/*
	 * 权限继承关系
	 * 
	 */
	'permission_dependencies_table' => 'permission_dependencies',

	/*
	 * assigned_roles
	 */
	'assigned_roles_table' => 'assigned_roles',

	/*
	 * Configurations for the user
	 */
	'users' => [
		'default_per_page' => 25,

		/*
		 * 注册时默认角色
		 */
		//'default_role' => 'User',
		'default_role' => 7,

		/*
		 * 注册时是否确认邮件
		 */
		'confirm_email' => false,

		/*
		 * 非本人是否可以更改邮箱地址
		 */
		'change_email' => false,
	],
	'roles' => [
		/*
		 * 角色是否必须包含至少一个权限
		 */
		'role_must_contain_permission' => true
	],

	/*
	 * Socialite session variable name
	 */
	'socialite_session_name' => 'socialite_provider',
);