<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post_id' => 'required',
			'body' => 'required',
			
        ]);

        $new_lesson = Lesson::create([
            'title' => $request->input('title'),
            'post_id' => $request->input('post_id'),
			'body' => $request->input('body'),
        ]);
		$pi = $request->input('post_id');
        return redirect('admin/add_lesson/'.$pi)->with('success', "A new lesson was successfully added.");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson){
            return redirect()
                ->route('posts.index')
                ->with('warning', 'The post\'s lesson you requested for was not found.');
        }

        $this->validate($request, [
           'title' => 'required',
			'body' => 'required',
			
			
        ]);

		$lesson->title = $request->input('title');
		$lesson->body = $request->input('body');
		$lesson->save();

        return redirect()->back()->with('success', "The lesson was successfully updated.");

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                       $lesson = Lesson::find($id);

        if (!$lesson){
            return redirect()
                ->route('posts.index')
                ->with('warning', 'The lesson you requested for has not been found.');
        }

        $lesson->delete();

        return redirect()->back()->with('success', "The Lesson has successfully been archived.");

    }
}
