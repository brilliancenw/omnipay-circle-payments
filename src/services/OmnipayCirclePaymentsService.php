<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments\services;

use brilliance\omnipaycirclepayments\OmnipayCirclePayments;

use Craft;
use craft\base\Component;

/**
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 */
class OmnipayCirclePaymentsService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (OmnipayCirclePayments::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
