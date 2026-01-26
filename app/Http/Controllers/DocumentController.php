<?php

// app/Http/Controllers/DocumentController.php

namespace App\Http\Controllers;

use App\Helpers\NotificationHelper;
use App\Models\Document;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(LegalCase $legalCase)
    {
        $documents = $legalCase->documents()->latest()->get();
        return view('documents.index', compact('legalCase', 'documents'));
    }

    public function create(LegalCase $legalCase)
    {
        return view('documents.create', compact('legalCase'));
    }

    public function store(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $path = $request->file('file')->store('documents', 'public');

        $legalCase->documents()->create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
            'mime_type' => $request->file('file')->getMimeType(),
        ]);

        foreach ($legalCase->users as $user) {
            NotificationHelper::notify($user, [
                'type' => 'document_added',
                'title' => 'مستند جديد',
                'message' => 'تم إضافة مستند جديد للقضية',
                'url' => route('documents.index', $legalCase->id),
            ]);
        }

        NotificationHelper::notify($legalCase->client, [
            'type' => 'document_added',
            'title' => 'مستند جديد',
            'message' => 'تم إضافة مستند جديد لقضيتك',
            'url' => route('client.documents.index'),
        ]);

        return redirect()->route('documents.index', $legalCase->id)->with('success', 'Document uploaded.');
    }

    public function show(LegalCase $legalCase, Document $document)
    {
        return view('documents.show', compact('legalCase', 'document'));
    }

    public function destroy(LegalCase $legalCase, Document $document)
    {
        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index', $legalCase->id)->with('success', 'Document deleted.');
    }
}
