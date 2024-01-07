<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\View\View;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * index
     * 
     * @return view
     */

     public function index(Request $request): View
     {
        $amountToShow = $request->input('nShown', 10);
        $keyword = $request->input('searchItem');

        // get book
        $books = Book::orderByDesc('rating')
            ->limit($amountToShow)
            ->get();

         if ($keyword != "") {
            $books = Book::orderByDesc('rating')
               ->where('author', '=', $keyword)
               ->orWhere('title','=', $keyword)
               ->limit(100)
               ->get();
         }

        // Define the amounts variable
        $amounts = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

        // render view with posts
        return view('books.index',compact('books', 'amounts', 'amountToShow'));
     }

   //   public function search(Request $request)
   //   {
   //       $amountToShow = $request->input('nShown', 10);
   //      $searchItem = $request->input('searchItem');
   //      $amounts = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

   //      $books = Book::orderByDesc('rating')
   //      ->where('author', 'like', "%$searchItem%")
   //      ->orWhere('title','like',"%$searchItem%")
   //      ->limit(100)
   //      ->get();

   //      return view('books.index',compact('books', 'amounts'));
   //   }

     public function showTopAuthor()
     {
        $amountToShow = 10;

        $books = Book::orderByDesc('voter')
        ->where('voter', '>=', "5")
        ->take($amountToShow)
        ->get();

        return view('books.author',compact('books')); // view named 'author' will get access to data named 'books'
     }

     public function showVoteData()
     {
      $books = Book::limit(100)->get();

      return view('books.vote', compact('books'));
     }

     public function insertVote(Request $request)
     {

      $bookAuthor = $request->input('authorSelect');
      $bookSelectId = $request->input('bookSelect');
      $rating = $request-> input('rating');

      $books = Book::limit(100)->get();

      // check whether if the selected book and selected author matched
      $getBookById = Book::where('id', '=', $bookSelectId)->first();
      $validateBookByAuthor = $getBookById->title;

      $bookInAuthor = Book::where('title', '=', $getBookById, 'and', 'author', '=', $bookAuthor);

      // if the desired author have a book named x, then ...
      if ($bookInAuthor != null) {

         // get the rating and voter count
         $oldRating = $getBookById->rating;
         $voter = $getBookById->voter;

         // initialize new rating
         $newRating = ($oldRating * $voter);
         
         // add voter by 1
         $voter = $voter + 1;

         // update book's voter count
         $getBookById->voter = $voter;

         // update book's rating
         $newRating = ($newRating + $rating)/$voter;

         // save update to database
         $getBookById->save();
      } else {
         dd($authorSelect, "does not have a book named ", $validateBookByAuthor);
      }

      return redirect()->route('books.index');
     }
}
