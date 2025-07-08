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

    'accepted' => ':attributeを承認してください。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url' => ':attributeは正しいURLではありません。',
    'after' => ':attributeは:dateより後の日付にしてください。',
    'after_or_equal' => ':attributeは:date以降の日付にしてください。',
    'alpha' => ':attributeは英字のみにしてください。',
    'alpha_dash' => ':attributeは英数字とハイフンとアンダースコアのみにしてください。',
    'alpha_num' => ':attributeは英数字のみにしてください。',
    'array' => ':attributeは配列にしてください。',
    'ascii' => ':attributeは英数字と記号のみを含む必要があります。',
    'before' => ':attributeは:dateより前の日付にしてください。',
    'before_or_equal' => ':attributeは:date以前の日付にしてください。',
    'between' => [
        'array' => ':attributeは:min個から:max個の間で指定してください。',
        'file' => ':attributeは:min KBから:max KBの間で指定してください。',
        'numeric' => ':attributeは:minから:maxの間で指定してください。',
        'string' => ':attributeは:min文字から:max文字の間で指定してください。',
    ],
    'boolean' => ':attributeはtrueかfalseにしてください。',
    'can' => ':attributeには許可されていない値が含まれています。',
    'confirmed' => ':attributeと:attribute確認が一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeは正しい日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付にしてください。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'decimal' => ':attributeは小数点以下:decimal桁で指定してください。',
    'declined' => ':attributeは拒否する必要があります。',
    'declined_if' => ':otherが:valueの場合、:attributeは拒否する必要があります。',
    'different' => ':attributeと:otherは異なるものにしてください。',
    'digits' => ':attributeは:digits桁にしてください。',
    'digits_between' => ':attributeは:min桁から:max桁の間で指定してください。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeの値が重複しています。',
    'doesnt_end_with' => ':attributeは以下のいずれかで終わらない必要があります: :values。',
    'doesnt_start_with' => ':attributeは以下のいずれかで始まらない必要があります: :values。',
    'email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
    'ends_with' => ':attributeは以下のいずれかで終わる必要があります: :values。',
    'enum' => '選択された:attributeは無効です。',
    'exists' => '選択された:attributeは無効です。',
    'extensions' => ':attributeには以下の拡張子のいずれかが必要です: :values。',
    'file' => ':attributeはファイルにしてください。',
    'filled' => ':attributeは必須項目です。',
    'gt' => [
        'array' => ':attributeは:value個より多くする必要があります。',
        'file' => ':attributeは:value KBより大きくする必要があります。',
        'numeric' => ':attributeは:valueより大きくする必要があります。',
        'string' => ':attributeは:value文字より多くする必要があります。',
    ],
    'gte' => [
        'array' => ':attributeは:value個以上にする必要があります。',
        'file' => ':attributeは:value KB以上にする必要があります。',
        'numeric' => ':attributeは:value以上にする必要があります。',
        'string' => ':attributeは:value文字以上にする必要があります。',
    ],
    'hex_color' => ':attributeは有効な16進色である必要があります。',
    'image' => ':attributeは画像にしてください。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeは:otherに存在しません。',
    'integer' => ':attributeは整数にしてください。',
    'ip' => ':attributeは正しいIPアドレスにしてください。',
    'ipv4' => ':attributeは正しいIPv4アドレスにしてください。',
    'ipv6' => ':attributeは正しいIPv6アドレスにしてください。',
    'json' => ':attributeは正しいJSON文字列にしてください。',
    'lowercase' => ':attributeは小文字である必要があります。',
    'lt' => [
        'array' => ':attributeは:value個未満にする必要があります。',
        'file' => ':attributeは:value KB未満にする必要があります。',
        'numeric' => ':attributeは:value未満にする必要があります。',
        'string' => ':attributeは:value文字未満にする必要があります。',
    ],
    'lte' => [
        'array' => ':attributeは:value個以下にする必要があります。',
        'file' => ':attributeは:value KB以下にする必要があります。',
        'numeric' => ':attributeは:value以下にする必要があります。',
        'string' => ':attributeは:value文字以下にする必要があります。',
    ],
    'mac_address' => ':attributeは有効なMACアドレスである必要があります。',
    'max' => [
        'array' => ':attributeは:max個以下にしてください。',
        'file' => ':attributeは:max KB以下にしてください。',
        'numeric' => ':attributeは:max以下にしてください。',
        'string' => ':attributeは:max文字以下にしてください。',
    ],
    'max_digits' => ':attributeは:max桁以下である必要があります。',
    'mimes' => ':attributeは:valuesタイプのファイルにしてください。',
    'mimetypes' => ':attributeは:valuesタイプのファイルにしてください。',
    'min' => [
        'array' => ':attributeは:min個以上にしてください。',
        'file' => ':attributeは:min KB以上にしてください。',
        'numeric' => ':attributeは:min以上にしてください。',
        'string' => ':attributeは:min文字以上にしてください。',
    ],
    'min_digits' => ':attributeは:min桁以上である必要があります。',
    'missing' => ':attributeが欠落している必要があります。',
    'missing_if' => ':otherが:valueの場合、:attributeが欠落している必要があります。',
    'missing_unless' => ':otherが:valueでない場合、:attributeが欠落している必要があります。',
    'missing_with' => ':valuesが存在する場合、:attributeが欠落している必要があります。',
    'missing_with_all' => ':valuesがすべて存在する場合、:attributeが欠落している必要があります。',
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数値にしてください。',
    'password' => [
        'letters' => ':attributeには少なくとも1つの文字を含める必要があります。',
        'mixed' => ':attributeには少なくとも1つの大文字と1つの小文字を含める必要があります。',
        'numbers' => ':attributeには少なくとも1つの数字を含める必要があります。',
        'symbols' => ':attributeには少なくとも1つの記号を含める必要があります。',
        'uncompromised' => '指定された:attributeがデータ漏洩に表示されています。別の:attributeを選択してください。',
    ],
    'present' => ':attributeは存在する必要があります。',
    'present_if' => ':otherが:valueの場合、:attributeが存在する必要があります。',
    'present_unless' => ':otherが:valueでない場合、:attributeが存在する必要があります。',
    'present_with' => ':valuesが存在する場合、:attributeが存在する必要があります。',
    'present_with_all' => ':valuesがすべて存在する場合、:attributeが存在する必要があります。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesに含まれていない場合、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherの存在を禁止します。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeを入力してください',
    'required_array_keys' => ':attributeフィールドには以下のエントリが必要です: :values。',
    'required_if' => ':otherが:valueの場合、:attributeは必須項目です。',
    'required_if_accepted' => ':otherが承認された場合、:attributeフィールドが必要です。',
    'required_unless' => ':otherが:valuesに含まれていない場合、:attributeは必須項目です。',
    'required_with' => ':valuesが存在する場合、:attributeは必須項目です。',
    'required_with_all' => ':valuesがすべて存在する場合、:attributeは必須項目です。',
    'required_without' => ':valuesが存在しない場合、:attributeは必須項目です。',
    'required_without_all' => ':valuesがすべて存在しない場合、:attributeは必須項目です。',
    'same' => ':attributeと:otherが一致しません。',
    'size' => [
        'array' => ':attributeは:size個にしてください。',
        'file' => ':attributeは:size KBにしてください。',
        'numeric' => ':attributeは:sizeにしてください。',
        'string' => ':attributeは:size文字にしてください。',
    ],
    'starts_with' => ':attributeは以下のいずれかで始まる必要があります: :values。',
    'string' => ':attributeは文字列にしてください。',
    'timezone' => ':attributeは正しいタイムゾーンにしてください。',
    'unique' => ':attributeは既に使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'uppercase' => ':attributeは大文字である必要があります。',
    'url' => ':attributeは正しいURLにしてください。',
    'ulid' => ':attributeは有効なULIDである必要があります。',
    'uuid' => ':attributeは有効なUUIDである必要があります。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "rule.attribute" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'name' => '名前',
        'weight' => '体重',
        'date' => '日付',
        'target_weight' => '目標体重',
        'calories' => 'カロリー',
        'exercise_content' => '運動内容',
    ],

];
