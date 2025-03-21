<?php

declare(strict_types=1);

namespace App\MoonShine\Applies;

use Closure;
use MoonShine\Contracts\UI\ApplyContract;
use MoonShine\Contracts\UI\FieldContract;

/**
 * Change the FieldContract in the DocBlocks to the desired Field
 * @implements ApplyContract<FieldContract>
 */
class Main implements ApplyContract
{
    /* @param  FieldContract  $field */
    public function apply(FieldContract $field): Closure
    {
        return static function (mixed $data) {
            // Logic
        };
    }
}
