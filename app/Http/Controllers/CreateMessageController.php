<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManagerStatic as Image;

//use Illuminate\Http\Request;
//use App\Image;
use Image as ImageIntervention;

class CreateMessageController extends Controller
{

    private function dataMessages($request)
    {
        $field = $request->input('field');
        $order = $request->input('order');

        $query = Message::join('users', 'users.id', '=', 'messages.user_id')
            ->select('messages.*', 'users.name', 'users.email');

        // Applying sorting to a query
        if ($order === 'asc') {
            $query->orderBy($field, 'asc');
        } elseif ($order === 'desc') {
            $query->orderBy($field, 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $collectionComments = $query->get();

        // Saving sorting options in the URL during pagination
        $collectionMessages = $query->whereNull('messages.message_id_comment')
            ->paginate(15)
            ->appends(['field' => $field, 'order' => $order]);

        return compact('collectionComments', 'collectionMessages');
    }

    public function create(Request $request)
    {
        return view('createMessage.index');
    }

    public function show(Request $request)
    {
        $dataMessages = $this->dataMessages($request);
        return view('showMessage.index', $dataMessages);
    }

    public function showComment(Request $request)
    {
        $dataMessages = $this->dataMessages($request);
        return view('showComment.index', $dataMessages);
    }

    public function store(Request $request)
    {
        // Image processing
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');

            // Resizing an Image
            $img = Image::make(public_path('storage/' . $imagePath));
            $img->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio(); // Proportional resizing
            });

            // Path to save the modified image
            $resizedImagePath = 'images/' . $image->hashName();

            // Save the modified image
            $img->save(public_path('storage/' . $resizedImagePath));
        }

        $hasHtmlTags = preg_match('/<[a-z][\s\S]*>/i', $request->input('content'));
        $validationRules = $hasHtmlTags
            ? 'regex:/^<a href="[^"]+" title="[^"]+">[^<]+<\/a>|<code>[^<]+<\/code>|<i>[^<]+<\/i>|<strong>[^<]+<\/strong>$/'
            : '';

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'url' => 'nullable|url',
            'content' => [
                'required',
                'string',
                'max:2000',
                $validationRules,
            ],
            'message_id_comment' => 'nullable|integer',
            'captcha' => 'required|captcha',
            'image' => 'nullable|image|dimensions:min_width=320,min_height=240|mimes:jpg,png,gif',
            'text_file' => 'nullable|mimes:txt|max:100',
        ]);

        if ($request->hasFile('text_file')) {
            $textFilePath = $request->file('text_file')->store('text_files', 'public');
        }

        $user = User::firstOrNew(['email' => $request->email]);

        //  If there is no user, we save it
        if (!$user->exists) {
            $user->name = $validated['name'];
            $user->url = $validated['url'];
            $user->save();
        }

        $message = new Message();
        $message->content = $validated['content'];
        $message->message_id_comment = $validated['message_id_comment'];
        $message->image = $imagePath ?? null;
        $message->text_file = $textFilePath ?? null;

        $user->messages()->save($message);

        return redirect()->route('showComment.show');
    }

}
