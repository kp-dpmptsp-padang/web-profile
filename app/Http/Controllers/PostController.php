<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
   public function index(Request $request)
   {
       $type = $request->query('type', 'berita');
       $posts = Post::where('jenis', $type)->latest()->paginate(10);
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
          'link' => 'nullable|url',
          'tanggal_publikasi' => 'required|date',
          'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);

     $type = $request->input('type', 'berita');

     try {
          $post = Post::create([
                'id_penulis' => Auth::id(),
                'judul' => $request->judul,
                'konten' => $request->konten,
                'jenis' => $type,
                'slug' => Str::slug($request->judul),
                'link' => $request->link,
                'tanggal_publikasi' => $request->tanggal_publikasi,
          ]);

          if ($request->has('tags')) {
                $post->tags()->sync($request->tags);
          }

          if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    Log::info('File type: ' . $image->getMimeType());
                    Log::info('File extension: ' . $image->getClientOriginalExtension());
                     try {
                          $path = $image->store('images', 'public');
                          $post->pictures()->create([
                                'nama_file' => $path,
                                'mine_type' => $image->getClientMimeType(),
                          ]);
                     } catch (\Exception $e) {
                          return redirect()->route('posts.index', ['type' => $type])
                                ->with('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
                     }
                }
          }

          return redirect()->route('posts.index', ['type' => $type])
                ->with('success', 'Postingan berhasil dibuat.');
     } catch (\Exception $e) {
          return redirect()->route('posts.index', ['type' => $type])
                ->with('error', 'Gagal membuat postingan: ' . $e->getMessage());
     }
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
               'link' => 'nullable|url',
               'tanggal_publikasi' => 'required|date',
               'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);

           $post->update([
               'judul' => $request->judul,
               'konten' => $request->konten,
               'slug' => Str::slug($request->judul),
               'jenis' => $post->jenis,
               'link' => $request->link,
               'tanggal_publikasi' => $request->tanggal_publikasi,
           ]);

           if ($request->has('tags')) {
               $post->tags()->sync($request->tags);
           } else {
               $post->tags()->detach();
           }

           if ($request->has('deleted_images')) {
               foreach ($request->deleted_images as $imageId) {
                   $picture = $post->pictures()->find($imageId);
                   if ($picture) {
                       if (Storage::disk('public')->exists($picture->nama_file)) {
                           Storage::disk('public')->delete($picture->nama_file);
                       }
                       
                       $thumbnailPath = 'thumbnails/' . basename($picture->nama_file);
                       if (Storage::disk('public')->exists($thumbnailPath)) {
                           Storage::disk('public')->delete($thumbnailPath);
                       }
                       
                       $picture->delete();
                   }
               }
           }

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
               ->with('success', 'Postingan berhasil diperbarui.');

       } catch (\Exception $e) {
           return redirect()->route('posts.index', ['type' => $post->jenis])
               ->with('error', 'Gagal memperbarui postingan: ' . $e->getMessage());
       }
   }

   public function destroy($id)
   {
       try {
           $post = Post::findOrFail($id);
           $type = $post->jenis;

           foreach ($post->pictures as $picture) {
               if (Storage::disk('public')->exists($picture->nama_file)) {
                   Storage::disk('public')->delete($picture->nama_file);
               }
               
               $thumbnailPath = 'thumbnails/' . basename($picture->nama_file);
               if (Storage::disk('public')->exists($thumbnailPath)) {
                   Storage::disk('public')->delete($thumbnailPath);
               }
               
               $picture->delete();
           }

           $post->delete();

           return redirect()->route('posts.index', ['type' => $type])
               ->with('success', 'Postingan berhasil dihapus.');
               
       } catch (\Exception $e) {
           return redirect()->route('posts.index', ['type' => $post->jenis])
               ->with('error', 'Gagal menghapus postingan: ' . $e->getMessage());
       }
   }
}