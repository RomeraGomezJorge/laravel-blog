<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function redirect_success_store(string $route): RedirectResponse
    {
        return redirect()->route($route)->with('success', __('Successfully created'));
    }

    protected function redirect_success_update(string $route): RedirectResponse
    {
        return redirect()->route($route)->with('success', __('Successfully updated'));
    }

    protected function redirect_success_delete(string $route): RedirectResponse
    {
        return redirect()->route($route)->with('success', __('Successfully deleted'));
    }
}
