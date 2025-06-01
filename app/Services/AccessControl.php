<?php
namespace App\Services;
use App\Models\Customer;
use App\Models\Publication;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class AccessControl
{
    public static function AccessPub(Publication $publication)
    {
        Gate::forUser(Auth::guard('customer')->user())->authorize('authorize-publication', $publication);
    }
    public static function FrobiddenPub(Publication $publication)
    {
        if (Gate::forUser(Auth::guard('customer')->user())->allows('forbidden-publication', $publication))
            abort(403);
    }
    public static function AccessAdmin()
    {
        Gate::forUser(Auth::guard('customer')->user())->authorize('administrator-access');
    }
}