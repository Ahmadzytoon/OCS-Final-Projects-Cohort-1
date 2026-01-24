<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function fakePay(Request $request)
    {
        // تأكد المستخدم مسجل دخول
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // تسجيل عملية الشراء (دفع وهمي)
        Purchase::firstOrCreate([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
        ]);

        return redirect()
            ->route('courses.show', $request->course_id)
            ->with('success', 'Payment successful, you can now watch the course 🎉');
    }
}
