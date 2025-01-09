<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
   public function index(Request $request)
   {
       $type = $request->query('type', 'berita');
       $posts = Post::where('jenis', $type)->get();
       $tags = Tag::all();

       return view('admin.posts.index', compact('posts', 'tags', 'type'));
   }

   public function store(Request $request)
   {
       $request->validate([
           'judul' => 'required|string|max:255',
           'konten' => 'required|string',
           'tags' => 'array',
           'tags.*' => 'exists:tags,id',
           'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
   
       // Ambil type dari input form, bukan dari query parameter
       $type = $request->input('type', 'berita');
   
       $post = Post::create([
           'id_penulis' => Auth::id(),
           'judul' => $request->judul,
           'konten' => $request->konten,
           'jenis' => $type, // Gunakan type yang diambil dari form
           'slug' => Str::slug($request->judul),
       ]);
   
       // Handle tags
       if ($request->has('tags')) {
           $post->tags()->sync($request->tags);
       }
   
       // Handle images
       if ($request->hasFile('images')) {
           foreach ($request->file('images') as $image) {
               $path = $image->store('images', 'public');
               $post->pictures()->create([
                   'nama_file' => $path,
                   'mine_type' => $image->getClientMimeType(),
               ]);
           }
       }
   
       return redirect()->route('posts.index', ['type' => $type])
               ->with('success', 'Post created successfully.');
   }

   public function update(Request $request, $id)
   {
       try {
           $post = Post::findOrFail($id);

           $request->validate([
               'judul' => 'required|string|max:255',
               'konten' => 'required|string',
               'tags' => 'array',
               'tags.*' => 'exists:tags,id',
               'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);

           // Gunakan jenis yang sudah ada di post
           $post->update([
               'judul' => $request->judul,
               'konten' => $request->konten,
               'slug' => Str::slug($request->judul),
               'jenis' => $post->jenis
           ]);

           // Handle tags
           if ($request->has('tags')) {
               $post->tags()->sync($request->tags);
           } else {
               $post->tags()->detach();
           }

           // Handle deleted images
           if ($request->has('deleted_images')) {
               foreach ($request->deleted_images as $imageId) {
                   $picture = $post->pictures()->find($imageId);
                   if ($picture) {
                       // Hapus file fisik
                       if (Storage::disk('public')->exists($picture->nama_file)) {
                           Storage::disk('public')->delete($picture->nama_file);
                       }
                       
                       // Hapus thumbnail jika ada
                       $thumbnailPath = 'thumbnails/' . basename($picture->nama_file);
                       if (Storage::disk('public')->exists($thumbnailPath)) {
                           Storage::disk('public')->delete($thumbnailPath);
                       }
                       
                       // Hapus record dari database
                       $picture->delete();
                   }
               }
           }

           // Handle new images
           if ($request->hasFile('images')) {
               foreach ($request->file('images') as $image) {
                   $path = $image->store('images', 'public');
                   $post->pictures()->create([
                       'nama_file' => $path,
                       'mine_type' => $image->getClientMimeType(),
                   ]);
               }
           }

           return redirect()->route('posts.index', ['type' => $post->jenis])
               ->with('success', 'Post berhasil diperbarui.');

       } catch (\Exception $e) {
           return redirect()->route('posts.index', ['type' => $post->jenis])
               ->with('error', 'Gagal memperbarui post: ' . $e->getMessage());
       }
   }

   public function destroy($id)
   {
       try {
           $post = Post::findOrFail($id);
           $type = $post->jenis;

           // Delete associated pictures
           foreach ($post->pictures as $picture) {
               // Hapus file fisik
               if (Storage::disk('public')->exists($picture->nama_file)) {
                   Storage::disk('public')->delete($picture->nama_file);
               }
               
               // Hapus thumbnail jika ada
               $thumbnailPath = 'thumbnails/' . basename($picture->nama_file);
               if (Storage::disk('public')->exists($thumbnailPath)) {
                   Storage::disk('public')->delete($thumbnailPath);
               }
               
               // Hapus record dari database
               $picture->delete();
           }

           // Delete the post
           $post->delete();

           return redirect()->route('posts.index', ['type' => $type])
               ->with('success', 'Post berhasil dihapus.');
               
       } catch (\Exception $e) {
           return redirect()->route('posts.index', ['type' => $post->jenis])
               ->with('error', 'Gagal menghapus post: ' . $e->getMessage());
       }
   }
}