<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
<<<<<<< HEAD
    public function hosts(): array
=======
    public function hosts()
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
