<?php

return [
    'captcha'                  => ':attribute 不正确。',
    'attributes' => [
        'captcha'               => '验证码',
        'username'              => '用户名',
        'password'              => '密码',
    ],

    'accepted'             => '参数 :attribute 验证的字段必须为 yes、 on、 1、或 true.',
    'active_url'           => '参数 :attribute 必须是一个合法的 URL.',
    'after'                => '参数 :attribute 必须是给定日期:date之后的值 .',
    'after_or_equal'       => '参数 :attribute 必须等于给定日期:date或:date之后的值 .',
    'alpha'                => '参数 :attribute 必须完全是中文或字母的字符.',
    'alpha_dash'           => '参数 :attribute 可能具有字母、数字、破折号（ - ）以及下划线（ _ ）.',
    'alpha_num'            => '参数 :attribute 必须完全是字母、数字.',
    'array'                => '参数 :attribute 必须是一个 PHP 数组.',
    'before'               => '参数 :attribute 必须是给定日期:date之前的值.',
    'before_or_equal'      => '参数 :attribute 必须等于给定日期:date或:date之后的值.',
    'between'              => [
        'numeric' => ':attribute 必须在 :min 到 :max 之间',
        'file'    => ':attribute 必须在 :min 到 :max KB之间',
        'string'  => ':attribute 必须在 :min 到 :max 个字符之间',
        'array'   => ':attribute 必须在 :min 到 :max 项之间',
    ],
    'boolean'              => '参数 :attribute 必须能够被转换为布尔值（true 或者 false）.',
    'confirmed'            => '参数 :attribute  二次确认不匹配.',
    'date'                 => '参数 :attribute 必须是通过 PHP 函数 strtotime 校验的有效日期,格式为：xxxx-xx-xx aa:bb:cc.',
    'date_format'          => '参数 :attribute 与给定的格式 :format不匹配.',
    'different'            => '参数 :attribute 必须不同于:other.',
    'digits'               => '参数 :attribute 必须是数字 :digits.',
    'digits_between'       => '参数 :attribute 数字长度必须在 :min 和 :max 之间.',
    'dimensions'           => '参数 :attribute必须是图片并且图片比例必须符合规则.',
    'distinct'             => '参数 :attribute 指定的字段不能有任何重复值.',
    'email'                => '参数 :attribute 必须符合 e-mail 地址格式.',
    'exists'               => '选定的 :attribute 是无效的.',
    'file'                 => '参数 :attribute 必须是成功上传的文件.',
    'filled'               => '参数 :attribute 在存在时不能为空.',
    'gt'                   => [
        'numeric' => 'The :attribute 必须大于 :value.',
        'file'    => 'The :attribute 必须大于 :value KB.',
        'string'  => 'The :attribute 必须大于 :value 个字符.',
        'array'   => 'The :attribute 必须大于 :value 项.',
    ],
    'gte'                  => [
        'numeric' => '参数 :attribute 必须大于或等于 :value.',
        'file'    => '参数 :attribute 必须大于或等于 :value KB.',
        'string'  => '参数 :attribute 必须大于或等于 :value 个字符.',
        'array'   => '参数 :attribute 必须大于或等于 :value 项.',
    ],
    'image'                => '参数 :attribute 必须是一个图像（ jpeg、png、bmp、gif、或 svg .',
    'in'                   => '参数 :attribute 必须包含在给定的值列表【:values】中.',
    'in_array'             => '参数 :attribute 必须存在于 :other值中.',
    'integer'              => '参数 :attribute 必须是整数.',
    'ip'                   => '参数 :attribute 必须是 IP 地址.',
    'ipv4'                 => '参数 :attribute 必须是 IPv4 地址.',
    'ipv6'                 => '参数 :attribute 必须是 IPv6 地址.',
    'json'                 => '参数 :attribute 必须是有效的 JSON 字符串.',
    'lt'                   => [
        'numeric' => 'The :attribute 必须小于 :value.',
        'file'    => 'The :attribute 必须小于 :value KB.',
        'string'  => 'The :attribute 必须小于 :value 字符.',
        'array'   => 'The :attribute 必须小于 :value 项.',
    ],
    'lte'                  => [
        'numeric' => 'The :attribute 必须小于或等于 :value.',
        'file'    => 'The :attribute 必须小于或等于 :value KB.',
        'string'  => 'The :attribute 必须小于或等于 :value 字符.',
        'array'   => 'The :attribute 必须小于或等于 :value 项.',
    ],
    'max'                  => [
        'numeric' => ':attribute 的最大长度为 :max 位',
        'file'    => ':attribute 的最大为 :max',
        'string'  => ':attribute 的最大长度为 :max 字符',
        'array'   => ':attribute 的最大个数为 :max 个',
    ],
    'mimes'                => '参数 :attribute 的文件类型必须是:values.',
    'mimetypes'            => '参数 :attribute 的文件类型必须是:values.',
    'min'                  => [
        'numeric' => ':attribute 的最小长度为 :min 位',
        'file'    => ':attribute 大小至少为:min KB',
        'string'  => ':attribute 的最小长度为 :min 字符',
        'array'   => ':attribute 至少有 :min 项',
    ],
    'not_in'               => '参数 :attribute 不能包含在给定的值列表【:values】中.',
    'not_regex'            => '参数 :attribute format is invalid.',
    'numeric'              => '参数 :attribute 必须是数字.',
    'present'              => '验证的字段:attribute必须存在于输入数据中，但可以为空.',
    'regex'                => ':attribute 格式不正确.',
    'required'             => '参数 :attribute 必须存在于输入,不能为空',
    'required_if'          => '当指定的字段:other 等于任何一个 value 时，被验证的字段:attribute必须存在且不为空.',
    'required_unless'      => '当指定的字段:other等于任何一个 :values 时，被验证的字段:attribute 不必存在.',
    'required_with'        => '只要在指定的其他字段中:values有任意一个字段存在时，被验证的字段:attribute就必须存在并且不能为空.',
    'required_with_all'    => '只有当所有的其他指定字段:values全部存在时，被验证的字段:attribute才必须存在并且不能为空.',
    'required_without'     => '只要在其他指定的字段中:values有任意一个字段不存在，被验证的字段:attribute就必须存在且不为空.',
    'required_without_all' => '只有当所有的其他指定的字段:values都不存在时，被验证的参数 :attribute 才必须存在且不为空.',
    'same'                 => '参数 :attribute 和 :other 必须匹配.',
    'size'                 => [
        'numeric' => '参数 :attribute 必须是 :size 位.',
        'file'    => '参数 :attribute 必须是 :size KB.',
        'string'  => '参数 :attribute 必须是 :size 个字符.',
        'array'   => '参数 :attribute 必须包括 :size 项.',
    ],
    'string'               => '参数 :attribute 必须是字符串.',
    'timezone'             => '参数 :attribute 必须个有效的时区.',
    'unique'               => '参数 :attribute 已存在.',
    'uploaded'             => '参数 :attribute 上传失败.',
    'url'                  => '参数 :attribute 必须是有效的 URL.',
    'mb_max'               => '参数 :attribute 必须是 :mb_max 字符以内.',
    'phone'                => '参数 :attribute 手机号码不合法',
];
