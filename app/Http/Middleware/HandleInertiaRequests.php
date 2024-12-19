<?php

namespace App\Http\Middleware;

use App\Contracts\AccountContract;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $accountContract;

    public function __construct(
        AccountContract $accountContract,
    ) {
        $this->accountContract = $accountContract;
    }

    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
                'account' => $this->accountContract->getLoggedInAccount(),
            ],
        ];
    }
}
