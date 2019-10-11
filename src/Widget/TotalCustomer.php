<?php
namespace AvoRed\Framework\Widget;

use AvoRed\Framework\Database\Contracts\ConfigurationModelInterface;

class TotalCustomer
{
    /**
     * UserGroup Repository for controller.
     * @var \AvoRed\Framework\Database\Repository\ConfigurationModelInterface
     */
    protected $configurationRepository;

    /**
     * Construct for the AvoRed user group controller.
     */
    public function __construct()
    {
        $this->configurationRepository = app(ConfigurationModelInterface::class);
    }

    /**
     * AvoRed Configuration Total Order Value
     * @var string
     */
    const CONFIGURATION_KEY = "avored-total-customer-value";

    /**
     * Widget View Path
     * @var string $view
     */

    protected $view = "avored::widget.total-customer";

    /**
     * Widget Label
     * @var string $view
     */

    protected $label = 'Total Customer';

    /**
     * Widget Type
     * @var string $view
     */

    protected $type = "cms";

    /**
     * Widget unique identifier
     * @var string $identifier
     */
    protected $identifier = "avored-total-customer";

    public function view()
    {
        return $this->view;
    }

    /*
     * Widget unique identifier
     *
     */
    public function identifier()
    {
        return $this->identifier;
    }

    /*
    * Widget unique identifier
    *
    */
    public function label()
    {
        return $this->label;
    }

    /*
    * Widget unique identifier
    *
    */
    public function type()
    {
        return $this->type;
    }

    /**
     * View Required Parameters
     *
     * @return array
     */
    public function with()
    {
        $value = $this->configurationRepository->getValueByCode(self::CONFIGURATION_KEY) ?? 0;
        return ['value' => $value];
    }

    public function render()
    {
        return view($this->view(), $this->with());
    }
}
