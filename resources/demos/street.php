<?php

use App\Street;
use Illuminate\Support\Facades\Input;
use Lego\Lego;

$street = Street::findOrNew(Input::get('id'));

$form = Lego::form($street);

if ($street->city_id) {
    $form->addRightBottomButton(
        '编辑城市：' . $street->city->name,
        route('demo', 'city') . '?id=' . $street->city_id
    );
}

$form->addAutoComplete('city.name', '所属城市')
    ->required();
$form->addText('name', '街道名称')
    ->required()
    ->unique();

$form->success(route('demo', 'street-list'));

return $form;
