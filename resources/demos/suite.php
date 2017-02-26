<?php

use App\Suite;
use Illuminate\Support\Facades\Input;
use Lego\Lego;

$street = Suite::findOrNew(Input::get('id'));

$form = Lego::form($street);

$form->addAutoComplete('street.name', '所属街道');
$form->addText('address', '公寓地址')->unique();
$form->addSelect('type', '公寓类型')->values(Suite::listType());
$form->addSelect('status', '公寓状态')
    ->options(array_combine(Suite::listStatus(), Suite::listStatus()));
$form->addTextarea('note', '备注');

$form->required();
// $form->required(['street.name', 'address', ...]);


$form->success(route('demo', 'suite-list'));

return $form;
