<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(20);
        return view('user.notifications.index', compact('notifications'));
    }

    public function markRead(Request $request, $id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        
        
        if ($request->has('redirect') && $request->redirect === 'notifications') {
            return redirect()->route('notifications.index')->with('success', 'Notification marked as read');
        }
        
        
        if ($notification->type === 'App\Notifications\ApplicationStatusUpdated') {
            $applicationId = $notification->data['application_id'] ?? null;
            if ($applicationId) {
                return redirect()->route('user.applications.show', $applicationId);
            }
        }
        
        if ($notification->type === 'App\Notifications\NewProgramApplication') {
            $applicationId = $notification->data['application_id'] ?? null;
            if ($applicationId) {
                return redirect()->route('admin.applications.show', $applicationId);
            }
        }

        if ($notification->type === 'App\Notifications\NewProgramPublished') {
            $programType = $notification->data['program_type'] ?? null;
            if ($programType) {
                // Redirect to specific program type list
                if ($programType === 'degree') {
                    return redirect()->route('programs.degree');
                } elseif ($programType === 'non-degree') {
                    return redirect()->route('programs.non-degree');
                }
            }
            // Default to programs index
            return redirect()->route('programs');
        }

        if ($notification->type === 'App\Notifications\NewsPublished') {
            $newsId = $notification->data['news_id'] ?? null;
            if ($newsId) {
                return redirect()->route('news-detail', $newsId);
            }
            return redirect()->route('news');
        }

        if ($notification->type === 'App\Notifications\EventPublished') {
            return redirect()->route('home')->with('info', 'Check the events calendar for the latest event.');
        }
        
        return redirect()->route('notifications.index');
    }

    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back()->with('success', 'All notifications marked as read');
    }
}

