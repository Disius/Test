<?php

namespace App\Http\Middleware;

use App\Http\Controllers\NotificationController;
use App\Models\Docente;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
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
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'info' => [
                [ fn (Docente $docente, Request $request) =>
                $request->user()
                    ? $docente->where('id', $request->user()->docente_id)->first('nombre', 'apellidoPat', 'apellidoMat')
                    : null
                ],
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'notification_count' => [
                fn(NotificationController $coordinacion) => $coordinacion->coordinacion_number_notifications()
            ],
            'coordinacion_notification' => [
                fn(NotificationController $coordinacion_notifications) => $coordinacion_notifications->coordinacion_notifications()
            ]
        ]);
    }
}
