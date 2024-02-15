<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index(Request $request){
        $courses = Course::latest();
        if ($request->has('search')) {
            $search = $request->get('search');
            $courses->where('name', 'like', '%' . $search . '%');
        }
        $courses = $courses->paginate(10); 
        $topics = Topic::latest()->get();
        $maxPrice = Course::max('price_range');
        return view('cources', compact('courses', 'topics', 'maxPrice'));
    }

    function filter(Request $request){
        $courses = Course::query();
        if ($request->has('topics')) {
            $topics = $request->topics; 
            $courses->whereIn('topic_id', $topics) ;
        }

        if ($request->has('price_range')) {
            $price_ranges = $request->price_range; 
            $courses->whereBetween('price_range', [0, $price_ranges]) ;
        } 

        if ($request->has('search')) {
            $search = $request->get('search');
            $courses->where('name', 'like', '%' . $search . '%');
        }

        if ($request->has('short')) { // Sorting
            $sort = $request->short;
            if ($sort === 'asc') {
                $courses->orderBy('id', 'asc');
            } else { 
                $courses->orderBy('id', 'desc');
            }
        }

        $courses = $courses->paginate(10); // Paginate the results
 
        $topics = Topic::latest()->get();
        $maxPrice = Course::max('price_range');
        return view('cources-filter', compact('courses', 'topics', 'maxPrice'));

        return response()->json([
            "status" => true,
            "html" => "category added successfully"
        ]);
    }
}
