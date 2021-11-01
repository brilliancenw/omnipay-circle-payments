<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments;

use brilliance\omnipaycirclepayments\services\OmnipayCirclePaymentsService as OmnipayCirclePaymentsServiceService;
use brilliance\omnipaycirclepayments\models\Settings;
use brilliance\omnipaycirclepayments\utilities\OmnipayCirclePaymentsUtility as OmnipayCirclePaymentsUtilityUtility;
use brilliance\omnipaycirclepayments\widgets\OmnipayCirclePaymentsWidget as OmnipayCirclePaymentsWidgetWidget;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\services\Utilities;
use craft\services\Dashboard;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class OmnipayCirclePayments
 *
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 *
 * @property  OmnipayCirclePaymentsServiceService $omnipayCirclePaymentsService
 */
class OmnipayCirclePayments extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var OmnipayCirclePayments
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = true;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['siteActionTrigger1'] = 'omnipay-circle-payments/default';
            }
        );

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['cpActionTrigger1'] = 'omnipay-circle-payments/default/do-something';
            }
        );

        Event::on(
            Utilities::class,
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = OmnipayCirclePaymentsUtilityUtility::class;
            }
        );

        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = OmnipayCirclePaymentsWidgetWidget::class;
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'omnipay-circle-payments',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'omnipay-circle-payments/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
