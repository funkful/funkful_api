<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LibraryResource;
use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LibraryResource
     */
    public function index()
    {
        $libraries = Library::all();
        return LibraryResource::collection($libraries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return LibraryResource
     */
    public function store(Request $request)
    {
        $library = new Library;
        $library->name = $request->get('name');
        $library->slug = Str::slug($request->get('name'));
        $library->type = $request->get('type');
        $library->save();

        return new LibraryResource(Library::find($library->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $library
     * @return LibraryResource
     */
    public function show(Library $library)
    {
        return new LibraryResource($library);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $library
     * @return LibraryResource
     */
    public function update(Request $request, Library $library)
    {
        if ($request->get('name')) {
            $library->name = $request->get('name');
            $library->slug = Str::slug($request->get('name'));
        }

        if ($request->get('type')) {
            $library->type = $request->get('type');
        }

        $library->save();

        return new LibraryResource(Library::find($library->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $library
     * @return LibraryResource
     */
    public function destroy(Library $library)
    {
        $library->delete();
    }

    /**
     * Adds folders to a library
     * 
     * @param object $library
     * @return LibraryResource
     */
    public function addFolders(Request $request, $library)
    {
        $library = Library::find($library);
        $folders = explode(',', $request->get('folders'));
        foreach ($folders as $folder)
        {
            $libraryFolder = $library->folder()->create([
                'path' => $folder,
            ]);

            return $libraryFolder;
        }
    }
}
