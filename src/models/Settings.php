<?php
/**
 * Omnipay Circle Payments plugin for Craft CMS 3.x
 *
 * Omnipay Circle Payments
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2021 Brilliance
 */

namespace brilliance\omnipaycirclepayments\models;

use brilliance\omnipaycirclepayments\OmnipayCirclePayments;

use Craft;
use craft\base\Model;

/**
 * @author    Brilliance
 * @package   OmnipayCirclePayments
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
