<?php

declare(strict_types=1);

namespace Tmoiseenko\MoonshineLatex\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Stringable;
use MoonShine\Fields\Code;

class Latex extends Code
{
    protected string $view = 'moonshine-latex::fields.latex';

    public function getAssets(): array
    {
        return [
            "https://cdn.jsdelivr.net/npm/latex.js/dist/latex.js"
        ];
    }
}
