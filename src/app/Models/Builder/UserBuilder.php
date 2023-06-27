<?php

namespace App\Models\Builder;

/**
 * @template TModelClass of \App\Models\User
 *
 * @extends Builder<TModelClass>
 */
class UserBuilder extends Builder
{
    public function whereSomethingElse($column, $values, $boolean = 'and'): self
    {
        return parent::whereSomethingElse(...func_get_args());
    }
}
