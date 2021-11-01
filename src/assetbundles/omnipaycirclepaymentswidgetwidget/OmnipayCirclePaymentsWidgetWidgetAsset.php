<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments\assetbundles\omnipaycirclepaymentswidgetwidget;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 */
class OmnipayCirclePaymentsWidgetWidgetAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@brilliance/omnipaycirclepayments/assetbundles/omnipaycirclepaymentswidgetwidget/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/OmnipayCirclePaymentsWidget.js',
        ];

        $this->css = [
            'css/OmnipayCirclePaymentsWidget.css',
        ];

        parent::init();
    }
}
