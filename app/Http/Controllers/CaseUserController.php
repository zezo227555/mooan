<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationHelper;
use App\Models\LegalCase;
use App\Models\User;
use Illuminate\Http\Request;

class CaseUserController extends Controller
{
    // GET /legal_cases/{legal_case}/users
    public function index(LegalCase $legalCase)
    {
        $assignedUsers = $legalCase->users;
        $allUsers = User::where('role', 'attorney')->get();
        return view('case-users.index', compact('legalCase', 'assignedUsers', 'allUsers'));
    }

    // POST /legal_cases/{legal_case}/users
    public function store(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:100',
        ]);

        $legalCase->users()->syncWithoutDetaching([
            $request->user_id => ['role' => $request->role],
        ]);

        foreach ($legalCase->users() as $user) {
            NotificationHelper::notify(
                $user, // the attorney
                [
                    'type' => 'case_assigned',
                    'title' => 'تم إسناد قضية',
                    'message' => 'تم إسناد قضية رقم ' . $legalCase->case_number,
                    'url' => route('legal-cases.show', $legalCase->id),
                ],
            );
        }

        return redirect()->route('case-users.index', $legalCase->id)->with('success', 'User assigned to case.');
    }

    // PUT /legal_cases/{legal_case}/users/{user}
    public function update(Request $request, LegalCase $legalCase, User $user)
    {
        $request->validate([
            'role' => 'required|string|max:100',
        ]);

        $legalCase->users()->updateExistingPivot($user->id, ['role' => $request->role]);

        return redirect()->route('case-users.index', $legalCase->id)->with('success', 'User role updated.');
    }

    // DELETE /legal_cases/{legal_case}/users/{user}
    public function destroy(LegalCase $legalCase, User $user)
    {
        $legalCase->users()->detach($user->id);
        return redirect()->route('case-users.index', $legalCase->id)->with('success', 'User removed from case.');
    }
}
