<?php

declare(strict_types=1);

namespace RLTSquare\Unit3\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * class EnvironmentType
 */
class EnvironmentType implements OptionSourceInterface
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'staging', 'label' => __('Staging')],
            ['value' => 'production', 'label' => __('Production')],
            ['value' => 'development', 'label' => __('Development')]
        ];
    }
}
