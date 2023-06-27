<?php

namespace App\Models\Builder;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;

/**
 * @template TModelClass of \Illuminate\Database\Eloquent\Model
 *
 * @extends BaseBuilder<TModelClass>
 */
abstract class Builder extends BaseBuilder
{
    public function whereSomething($column, $values, $boolean = 'and'): static
    {
        return $this->whereNotIn(...func_get_args());
    }

    public function whereSomethingElse($column, $values, $boolean = 'and'): self
    {
        return $this->whereNotIn(...func_get_args());
    }
}
