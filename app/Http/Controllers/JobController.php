<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with((['faction', 'tags']))->get()->groupBy('featured');

        return view('jobs.index', [
            'jobs' => $jobs[0],
            'featuredJobs' => $jobs[1],            
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'=> ['required'],
            'salary'=> ['required'],
            'location'=> ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'description' => ['required'],
            'tags' => ['nullable'],

        ]);

        $attributes['featured'] = $request->has('featured'); // If checked, it's true. If not, it's false.

        $job = Auth::user()->faction->jobs()->create(Arr::except($attributes, ['tags']));

        if ($attributes['tags'] ?? false) {
            $tags = explode(',', $attributes['tags']);
            $tags = array_map('trim', $tags); // Remove spaces
            $tags = array_map('strtolower', $tags); // Convert to lowercase
            sort($tags); // 🔥 Sort them alphabetically
        
            foreach ($tags as $tag) {
                $job->tag($tag);
            }
        }

            return redirect('/');
        }
    

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required','string', 'min:3'],
            'salary' => ['required', 'string'],
            'location' => ['required', 'string'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'description' => ['required','string'],
        ]);

        $data = request()->except(['tags', '_token', '_method']);
        $data['featured'] = request()->has('featured'); // If checked, it's true. If not, it's false.
    
        $job->update($data);
    
        if (request('tags')) {
            $tags = explode(',', request('tags'));
            $tags = array_map('trim', $tags); 
            $tags = array_map('strtolower', $tags); 
            sort($tags); // 🔥 Sort them alphabetically
        
            $tagIds = [];
            foreach ($tags as $tagName) {
                if (!$tagName) continue;
        
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        
            $job->tags()->sync($tagIds);
        }
            
        return redirect('jobs/' . $job->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/');
    }
}
