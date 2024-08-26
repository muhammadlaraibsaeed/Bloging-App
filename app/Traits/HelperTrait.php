<?php
namespace App\Traits;

use App\Models\Comment;
use App\Mail\CommentMail;
use App\Mail\VoteMail;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

trait HelperTrait{

    public function storeImage($request,$postId)
    {

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $fileUrls = [];
            $imagesData = [];
            
            foreach ($files as $file) {
                $destinationPath = 'images'; // e.g., public/uploads/images
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path($destinationPath), $fileName);
                $fileUrl = asset($destinationPath . '/' . $fileName);
                $fileUrls[] = $fileUrl;
                $imagesData[] = ['url' => $fileUrl,'post_id'=>$postId];
            }
            return $imagesData;
        }
       
    }


    // public function sendCommentMail($comments)
    // {
    //     $comments['send_email'] = Auth::user()->email;
    //     Mail::to($comments->feedback->user->email)->queue(new CommentMail($comments));
    // }

    // public function sendVoteMail($votes)
    // {
    //     $votes['send_email'] = Auth::user()->email;
    //     // email who create feedback
    //     Mail::to($votes->feedback->user->email)->queue(new VoteMail($votes));
    // }

}