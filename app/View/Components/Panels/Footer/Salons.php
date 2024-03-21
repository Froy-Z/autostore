<?php

namespace App\View\Components\Panels\Footer;

use App\Contracts\Repositories\SalonsRepositoryContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Salons extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private readonly SalonsRepositoryContract $salonsRepository
    ) {
    }

    public function render(): View|Closure|string
    {
        $salons = $this->salonsRepository->getSalons(2, true);
        return view('components.panels.footer.salons', ['salons' => $salons]);
    }
}
