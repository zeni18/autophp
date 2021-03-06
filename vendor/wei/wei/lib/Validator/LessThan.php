<?php
/**
 * Wei Framework
 *
 * @copyright   Copyright (c) 2008-2015 Twin Huang
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Wei\Validator;

/**
 * Check if the input is less than (<) the specified value
 *
 * @author      Twin Huang <twinhuang@qq.com>
 */
class LessThan extends EqualTo
{
    protected $invalidMessage = '%name% must be less than %value%';

    protected $negativeMessage = '%name% must not be less than %value%';

    /**
     * {@inheritdoc}
     */
    protected function doCompare($input)
    {
        return $input < $this->value;
    }
}
