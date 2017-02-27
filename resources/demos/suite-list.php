<?php

use App\Suite;
use Lego\Lego;
use Lego\Widget\Form;

$filter = Lego::filter(Suite::with('street.city'));
$filter->addText('street.city.name', '城市名称');
$filter->addAutoComplete('street.name', '街道名称');
$filter->addText('address', '地址');
$filter->addSelect('type', '公寓类型')->values(Suite::listType());
$filter->addSelect('status', '公寓状态')->values(Suite::listStatus());
$filter->addDateRange('created_at', '创建时间');

$grid = Lego::grid($filter);
$grid->add('id', '操作')->pipe(function ($id) {
    return link_to(route('demo', 'suite') . '?id=' . $id, '编辑');
});
$grid->add('street.city.name', '城市');
$grid->add('street.name', '街道');
$grid->add('address', '地址');
$grid->add('type', '类型');
$grid->add('status', '状态');
$grid->add('created_at|date', '创建日期');

$grid->addLeftTopButton('新建公寓', route('demo', 'suite'));

$grid->addBatch('批量删除')
    ->action(function (Suite $suite) {
        $suite->delete();
    });

$grid->addBatch('修改状态')
    ->form(function (Form $form) use ($grid) {
        $form->addSelect('status', '公寓状态')
            ->values(Suite::listStatus())
            ->required();
    })
    ->action(function (Suite $suite, Form $form) {
        $suite->status = $form->field('status')->getNewValue();
        $suite->save();
    });

return $grid;
