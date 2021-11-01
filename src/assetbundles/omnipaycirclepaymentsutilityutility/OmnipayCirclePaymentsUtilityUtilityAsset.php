<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments\assetbundles\omnipaycirclepaymentsutilityutility;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 */
class OmnipayCirclePaymentsUtilityUtilityAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@brilliance/omnipaycirclepayments/assetbundles/omnipaycirclepaymentsutilityutility/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/OmnipayCirclePaymentsUtility.js',
        ];

        $this->css = [
            'css/OmnipayCirclePaymentsUtility.css',
        ];

        parent::init();
    }
}
