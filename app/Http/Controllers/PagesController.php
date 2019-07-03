<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex() {
        $top_post = Post::orderBy('created_at', 'desc')->limit(1)->get();
        $posts = Post::orderBy('created_at', 'desc')->limit(7)->get();
        #$posts = Post::paginate(10);
        return view('pages/home')->with('posts', $posts)->with('top_post', $top_post);
    }
    
    public function getContact()
    {
        return view('pages/contact');
    }

    public function postContact(Request $request) 
    {
         $this->validate($request, [
             'email'=>'required|email',
             'message'=>'min:10',
             'subject'=>'min:3'
         ]);
         $data = [
             'email' => $request->email,
             'subject' => $request->subject,
             'bodyMessage' => $request->message,
         ];
         
         Mail::send('emails.contact', $data, function($message) use ($data){
             $message->from($data['email']);
             $message->to('dwayne@omi.nz');
             $message->subject($data['subject']);
             
         });
         
         Session::flash('success', 'Thank you. Your email was sent.');
         
         return redirect('/');
         
    }

    public function getAbout() {return view('pages/about');}
    
}
