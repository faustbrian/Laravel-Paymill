<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Paymill.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Paymill\Endpoints;

class Refund extends Endpoint
{
    protected $namespace = 'refunds';

    protected $transformer = \Artisanry\Paymill\Transformers\Refund::class;
}
