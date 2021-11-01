<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments\widgets;

use brilliance\omnipaycirclepayments\OmnipayCirclePayments;
use brilliance\omnipaycirclepayments\assetbundles\omnipaycirclepaymentswidgetwidget\OmnipayCirclePaymentsWidgetWidgetAsset;

use Craft;
use craft\base\Widget;

/**
 * Omnipay Circle Payments Widget
 *
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 */
class OmnipayCirclePaymentsWidget extends Widget
{

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $message = 'Hello, world.';

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('omnipay-circle-payments', 'OmnipayCirclePaymentsWidget');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@brilliance/omnipaycirclepayments/assetbundles/omnipaycirclepaymentswidgetwidget/dist/img/OmnipayCirclePaymentsWidget-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function maxColspan()
    {
        return null;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge(
            $rules,
            [
                ['message', 'string'],
                ['message', 'default', 'value' => 'Hello, world.'],
            ]
        );
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate(
            'omnipay-circle-payments/_components/widgets/OmnipayCirclePaymentsWidget_settings',
            [
                'widget' => $this
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerAssetBundle(OmnipayCirclePaymentsWidgetWidgetAsset::class);

        return Craft::$app->getView()->renderTemplate(
            'omnipay-circle-payments/_components/widgets/OmnipayCirclePaymentsWidget_body',
            [
                'message' => $this->message
            ]
        );
    }
}
