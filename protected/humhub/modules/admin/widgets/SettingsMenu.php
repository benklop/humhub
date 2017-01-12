<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\admin\widgets;

use Yii;
use yii\helpers\Url;

/**
 * Group Administration Menu
 */
class SettingsMenu extends \humhub\widgets\BaseMenu
{

    /**
     * @inheritdoc
     */
    public $template = "@humhub/widgets/views/tabMenu";

    public function init()
    {
        $canEditSettings = Yii::$app->user->can(new \humhub\modules\admin\permissions\ManageSettings());

        $this->addItem([
            'label' => Yii::t('AdminModule.widgets_AdminMenuWidget', 'General'),
            'url' => Url::toRoute('/admin/setting/index'),
            'icon' => '<i class="fa fa-cogs"></i>',
            'sortOrder' => 100,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'setting' && Yii::$app->controller->action->id == 'basic'),
            'isVisible' => $canEditSettings
        ]);

        $this->addItem([
            'label' => Yii::t('AdminModule.widgets_AdminMenuWidget', 'Appearance'),
            'url' => Url::toRoute('/admin/setting/design'),
            'icon' => '<i class="fa fa-magic"></i>',
            'sortOrder' => 200,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'setting' && Yii::$app->controller->action->id == 'design'),
            'isVisible' => $canEditSettings
        ]);

        $this->addItem([
            'label' => Yii::t('AdminModule.widgets_AdminMenuWidget', 'Notifications'),
            'url' => Url::toRoute('/admin/setting/notification'),
            'icon' => '<i class="fa fa-envelope"></i>',
            'sortOrder' => 400,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'setting' && (Yii::$app->controller->action->id == 'notification')),
            'isVisible' => $canEditSettings
        ]);

        $this->addItem([
            'label' => Yii::t('AdminModule.widgets_AdminMenuWidget', 'E-Mail summaries'),
            'url' => Url::toRoute('/activity/admin/defaults'),
            'icon' => '<i class="fa fa-envelope"></i>',
            'sortOrder' => 400,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'activity' && Yii::$app->controller->id == 'admin' && (Yii::$app->controller->action->id == 'defaults')),
            'isVisible' => $canEditSettings
        ]);

        $this->addItem([
            'label' => Yii::t('AdminModule.widgets_AdminMenuWidget', 'Mail summaries'),
            'url' => Url::toRoute('/activity/admin/defaults'),
            'icon' => '<i class="fa fa-envelope"></i>',
            'sortOrder' => 400,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'activity' && Yii::$app->controller->id == 'admin' && (Yii::$app->controller->action->id == 'defaults')),
            'isVisible' => $canEditSettings
        ]);

        $this->addItem([
            'label' => Yii::t('AdminModule.widgets_AdminMenuWidget', 'Advanced'),
            'url' => Url::toRoute('/admin/setting/advanced'),
            'icon' => '<i class="fa fa-lock"></i>',
            'sortOrder' => 1000,
            'isVisible' => $canEditSettings
        ]);

        parent::init();
    }

}
