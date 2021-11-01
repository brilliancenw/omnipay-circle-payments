<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments\utilities;

use brilliance\omnipaycirclepayments\OmnipayCirclePayments;
use brilliance\omnipaycirclepayments\assetbundles\omnipaycirclepaymentsutilityutility\OmnipayCirclePaymentsUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * Omnipay Circle Payments Utility
 *
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 */
class OmnipayCirclePaymentsUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('omnipay-circle-payments', 'OmnipayCirclePaymentsUtility');
    }

    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'omnipaycirclepayments-omnipay-circle-payments-utility';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@brilliance/omnipaycirclepayments/assetbundles/omnipaycirclepaymentsutilityutility/dist/img/OmnipayCirclePaymentsUtility-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(OmnipayCirclePaymentsUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'omnipay-circle-payments/_components/utilities/OmnipayCirclePaymentsUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
