<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    public bool $valueIsCollection;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public Collection $list,
        public ?string $id = null,
        public string $optionValuesKeys = 'id',
        public string $optionValuesTexts = 'name',
        public mixed $value = null,
        public bool $multiple = false,
        public string $help = '',
    )
    {
        $this->id ??= $name;
        $this->handleValue();
    }

    protected function handleValue(): void
    {
        $this->value = old($this->name) ?? $this->value;
        if (is_array($this->value)) {
            $this->value = collect($this->value);
        }
        $this->valueIsCollection = $this->value instanceof Collection;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.select');
    }
}
