<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric'           => 'The :attribute must be between :min and :max.',
        'file'              => 'The :attribute must be between :min and :max kilobytes.',
        'string'            => 'The :attribute must be between :min and :max characters.',
        'array'             => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
	'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => ' :attribute 必须为字符串.',
    'timezone'             => ' :attribute 错误.',
    'unique'               => ' :attribute 已经被占用.',
    'url'                  => ' :attribute 格式错误.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                      => '用户名',
        'truename'                  => '真实姓名',
        'sex'                       => '性别',
        'phone'                     => '手机号',
        'watch'                     => '微信号',
        'qq'                        => 'QQ',
        'avatar'                    => '头像',
        'email'                     => 'E-mail',
        'gold'                      => '金币',
        'password'                  => '密码',
        'password_confirmation'     => '确认密码',
        'old_password'              => '旧密码',
        'new_password'              => '新密码',
        'new_password_confirmation' => '新密码确认',
        'created_at'                => '创建于',
        'last_updated'              => '最后修改于',
        'actions'                   => '操作',
        'active'                    => '激活',
        'confirmed'                 => '确认',
        'send_confirmation_email'   => '发送确认邮件',
        'associated_roles'          => '相关角色',
        'other_permissions'         => '其他权限',
        'role_name'                 => '角色名称',
        'role_sort'                 => '排序',
        'associated_permissions'    => '相关权限',
        'permission_name'           => '权限名称',
        'display_name'              => '显示名称',
        'system_permission'         => '系统默认?',
        'permission_group_name'     => '组名称',
        'group'                     => '组',
        'group-sort'                => '排序',
        'dependencies'              => '依赖相关',
    ],

    /*article*/
    'article'       => [
        'name'      => '文章标题：',
        'desc'      => '文章简介：',
        'content'   => '文章内容：',
        'id'        => '',
        'banner'    => '',
    ],
    /*wishes*/
    'wishes'        => [
        'name'      => '祝福语标题：',
        'content'   => '祝福语内容：',
    ],

    /*category*/
    'category'        => [
        'name'      => '分类标题：',
        'desc'   => '分类内容：',
    ],
];