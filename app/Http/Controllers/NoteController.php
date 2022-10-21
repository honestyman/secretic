<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Services\NotesRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|ViewFactory
     */
    public function index(): View|ViewFactory
    {
        return view('home', [
            'foo' => 'bar', // TODO Temp
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|ViewFactory
     */
    public function showCreatePage(): View|ViewFactory
    {
        return view('note.new', [
            'hide_footer' => true,
        ]);
    }

    /**
     * Страница показывающая ссылку на.
     *
     * @param string $slug
     *
     * @return View|ViewFactory
     */
    public function showLink(string $slug): View|ViewFactory
    {
        return view('note.show-link', [
            'hide_footer' => true,
            'note_url'    => route('note.open_link', ['slug' => $slug]),
        ]);
    }

    /**
     * Показываем предупреждение перед расшифровкой заметки (или сообщение,
     * что заметка не существует).
     *
     * @param string          $slug
     * @param NotesRepository $notes_repository
     *
     * @return View|ViewFactory
     */
    public function openLink(
        string $slug,
        NotesRepository $notes_repository
    ): View|ViewFactory {
        $note = $notes_repository->findBySlug($slug);

        if ($note instanceof Note && $note->expiration_date !== null && $note->expiration_date < now()) {
            $note->delete();
            $note = null;
        }

        return view('note.before_watching', [
            'hide_footer' => true,
            'note'        => $note,
        ]);
    }

    /**
     * @param $slug
     * @param NotesRepository $notes_repository
     *
     * @return Application|RedirectResponse|View|ViewFactory
     */
    public function decrypt(
        $slug,
        NotesRepository $notes_repository
    ) {
        // TODO to request
        request()->validate([
            'decrypt_password' => 'string|max:100',
        ]);

        $note = $notes_repository->findBySlug($slug);
        if (! $note instanceof Note) {
            return back()->withErrors(['404' => 'The note does not exist, has already been read, or has expired']);
        }

        // TODO Simplify this block
        if ($note->password !== null) {
            if (! Hash::check(request()->decrypt_password, $note->password)) {
                return back()->withErrors(['bad_password' => 'Password incorrect']);
            }

            $note_text = Crypt::decryptString($note->text);
        } else {
            $note_text = Crypt::decryptString($note->text);
        }

        $note->delete();

        return view('note.show', [
            'hide_footer' => true,
            'note_text'   => $note_text,
        ]);
    }
}
