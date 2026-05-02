<?php

namespace App\Http\Controllers;

use App\Models\VipClient;
use Illuminate\View\View;

class VipProfileController extends Controller
{
    public function show(string $slug): View
    {
        $vipClient = VipClient::query()
            ->with('brand')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('vip.profile', compact('vipClient'));
    }
}
