<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Job;


class JobController extends Controller
{
    public function show_list(Request $request)
    {
        $sort_job = $request->input('sort_job');
        $job_city = $request->input('job_city');
        $job_sector = $request->input('job_sector');
        $jobs = Job::where('title', '<>', ' ');
        if($sort_job == 1)
        {
            $jobs = $jobs->orderBy('title', 'asc');
        }

        if($sort_job == 2)
        {
            $jobs = $jobs->orderBy('title', 'desc');
        }
        if($sort_job == 3)
        {
            $jobs = $jobs->orderBy('min_salary', 'asc');
        }
        if($sort_job == 4)
        {
            $jobs = $jobs->orderBy('min_salary', 'desc');
        }
        $city = null;
        if(is_null($job_city) == False)
        {
            $city = City::where('slug', $job_city)->first();
            $jobs = $jobs->where('city_id', $city->id);
        }
        if($job_sector != '')
        {
            $jobs = $jobs->where('sectors', $job_sector);
        }
        $cities = City::with('jobs')->get();
        $count = $jobs->count();
        $jobs = $jobs->paginate(9);
        return view('common.jobs', compact('jobs', 'city', 'cities', 'sort_job', 'count', 'job_sector'));
    }

    public function show($slug)
    {
        $job = Job::with('city')->where('slug', $slug)->first();
        $cities = City::with('jobs')->get();
        $city = City::where('id', $job->city_id)->first();
        if (!$job) {
            abort(403);
        }
        else {
            return view('job_show', compact('job', 'cities', 'city'));
        }
    }

    public function search(Request $request)
    {
        $city_slug = $request->input('city');
        $cities = City::with('jobs')->get();
        $search = $request->input('search');
        $sort_job = $request->input('sort_job');
        $jobs = Job::with('city')->where('title', '<>', ' ');


        if($sort_job == 1)
        {
            $jobs = $jobs->orderBy('title', 'asc');
        }

        if($sort_job == 2)
        {
            $jobs = $jobs->orderBy('title', 'desc');
        }
        if($sort_job == 3)
        {
            $jobs = $jobs->orderBy('min_salary', 'asc');
        }
        if($sort_job == 4)
        {
            $jobs = $jobs->orderBy('min_salary', 'desc');
        }

        if(is_null($city_slug))
        {
            $city = null;
            $jobs = $jobs
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('job_descriptions', 'LIKE', "%{$search}%")
                ->orWhere('sectors', 'LIKE', "%{$search}%")
                ->paginate(9);
        }
        else
        {
            $city = City::where('slug', $city_slug)->first();
            $jobs = $jobs->where(function($q) use ($search, $city){
                $q->where([['title', 'LIKE', "%{$search}%"], ['city_id', $city->id]])
                ->orWhere([['job_descriptionts', 'LIKE', "%{$search}%"] , ['city_id', $city->id]])
                ->orWhere([['sector', 'LIKE', "%{$search}%"] , ['city_id', $city->id]]);
            })->paginate(9);
        }
        return view('search', compact('jobs', 'search', 'city', 'cities', 'sort_job'));
    }
}
