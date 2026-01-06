<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileContactController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['nullable', 'string', 'max:20'],
            'postal_code' => ['nullable', 'string', 'max:10'],
            'address1' => ['nullable', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],
            'notification_enabled' => ['nullable', 'boolean'],
        ]);

        $user = $request->user();

        $user->update([
            'phone' => $validated['phone'] ?? null,
            'postal_code' => $validated['postal_code'] ?? null,
            'address1' => $validated['address1'] ?? null,
            'address2' => $validated['address2'] ?? null,
            'notification_enabled' => $request->has('notification_enabled'),
        ]);

        return back()->with('status', 'contact-updated');
    }
}
